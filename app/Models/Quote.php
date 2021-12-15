<?php

namespace App\Models;

use App\TemplateMail\QuoteTemplateMail;
use App\Models\Quote\QuoteDestination;
use App\Models\Quote\QuoteOrigin;
use App\Models\Quote\QuoteShipper;
use App\Models\Quote\QuoteTransport;
use App\Models\Quote\QuoteVehicle;
use App\Models\Quote\QuotePayment;
use App\Models\User;
use App\TemplateMail\SmsTemplateMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Url\Url as URI;
use Illuminate\Support\Facades\DB;

class Quote extends Model
{
    use HasFactory, LogsActivity;

    protected static $logFillable = true;
    protected static $recordEvents = ['created', 'deleted'];

    const STATUS_DELETED = -1;
    const STATUS_QUOTE = 0;
    const STATUS_SENT = 1;
    const STATUS_VIEWED = 2;
    const STATUS_APPROVED = 3;
    const STATUS_PAID = 4;
    const STATUS_ASSIGNED_TO_LOAD = 5;
    const STATUS_OUT_FOR_DELIVERY = 6;
    const STATUS_DELIVERED = 7;

    const STATUS_MAP = [
        self::STATUS_DELETED => 'Deleted',
        self::STATUS_QUOTE => 'Quote',
        self::STATUS_SENT => 'Sent',
        self::STATUS_VIEWED => 'Viewed',
        self::STATUS_APPROVED => 'Approved',
        self::STATUS_PAID => 'Paid',
        self::STATUS_ASSIGNED_TO_LOAD => 'Assigned To Load',
        self::STATUS_OUT_FOR_DELIVERY => 'Out for Delivery',
        self::STATUS_DELIVERED => 'Delivered'
    ];

    const QUOTE_STATUSES = [
        self::STATUS_QUOTE,
        self::STATUS_SENT,
        self::STATUS_VIEWED
    ];

    const QUOTE_WITH_APPROVED_STATUSES = [
        self::STATUS_QUOTE,
        self::STATUS_SENT,
        self::STATUS_VIEWED,
        self::STATUS_APPROVED
    ];

    const ORDER_STATUSES = [
        self::STATUS_APPROVED,
        self::STATUS_PAID,
        self::STATUS_ASSIGNED_TO_LOAD,
        self::STATUS_OUT_FOR_DELIVERY,
        self::STATUS_DELIVERED
    ];

    public static function getProgressStatusesMap(): array
    {
        return collect(self::STATUS_MAP)
            ->except(self::STATUS_DELETED)
            ->toArray();
    }

    public static function getQuoteStatusesMap()
    {
        return collect(self::STATUS_MAP)
            ->only(self::QUOTE_STATUSES)
            ->toArray();
    }

    public static function getQuoteStatusesMapWithApproved(): array
    {
        return collect(self::STATUS_MAP)
            ->only(array_merge(self::QUOTE_STATUSES, [self::STATUS_APPROVED]))
            ->toArray();
    }

    public static function getQuoteStatusesMapWithDeleted(): array
    {
        return collect(self::STATUS_MAP)
            ->only(array_merge(self::QUOTE_STATUSES, [self::STATUS_DELETED]))
            ->toArray();
    }

    public static function getPaidStatusesMap(): array
    {
        return collect(self::STATUS_MAP)
            ->only(self::STATUS_PAID, self::STATUS_ASSIGNED_TO_LOAD, self::STATUS_OUT_FOR_DELIVERY, self::STATUS_DELIVERED)
            ->toArray();
    }

    public static function getOrderStatusesMap(): array
    {
        return collect(self::STATUS_MAP)
            ->only(self::ORDER_STATUSES)
            ->toArray();
    }

    public static function getOrderStatusesMapWithDeleted(): array
    {
        return collect(self::STATUS_MAP)
            ->only(array_merge(self::ORDER_STATUSES, [self::STATUS_DELETED]))
            ->toArray();
    }

    public function isDeleted(): bool
    {
        return $this->status === self::STATUS_DELETED;
    }

    protected $fillable = [
        'shipper_id',
        'client_id',
        'status',
        'deleted_with_status'
    ];

    public function getStatusNameAttribute()
    {
        return self::STATUS_MAP[$this->status];
    }

    public function getDiffForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function quoteDestination()
    {
        return $this->hasOne(QuoteDestination::class);
    }

    public function quoteOrigin()
    {
        return $this->hasOne(QuoteOrigin::class);
    }

    public function quoteShipper()
    {
        return $this->hasOne(QuoteShipper::class);
    }

    public function quoteTransport()
    {
        return $this->hasOne(QuoteTransport::class);
    }

    public function quoteVehicle()
    {
        return $this->hasOne(QuoteVehicle::class);
    }
    public function quotePayment()
    {
        return $this->hasOne(QuotePayment::class);
    }
    public function email(string $email)
    {
        Mail::to($email)
            ->send(new QuoteTemplateMail($this));

        if ($this->status < self::STATUS_SENT) {
            $this->update([
                'status' => self::STATUS_SENT
            ]);
        }
    }

    public function convertToOrderUrl(bool $forClient = false): string
    {
        $quoteDataUrl = URL::temporarySignedRoute(
            'confirm-order.get-data',
            now()->addDay(),
            [
                'quote' => $this->id,
            ]
        );

        $confirmUrl = URL::temporarySignedRoute(
            'confirm-order.confirm',
            now()->addDay(),
            [
                'quote' => $this->id
            ]
        );

        $quoteDataUrl = URI::fromString($quoteDataUrl);
        $quote_data_signature = $quoteDataUrl->getQueryParameter("signature");
        $quote_data_expires = $quoteDataUrl->getQueryParameter("expires");

        $confirmUrl = URI::fromString($confirmUrl);
        $confirm_signature = $confirmUrl->getQueryParameter("signature");
        $confirm_expires = $confirmUrl->getQueryParameter("expires");

        $url = URI::fromString(url('/temporary/confirm-order/' . $this->id))
            ->withQueryParameter('quote_data_signature', $quote_data_signature)
            ->withQueryParameter('quote_data_expires', $quote_data_expires)
            ->withQueryParameter('confirm_signature', $confirm_signature)
            ->withQueryParameter('confirm_expires', $confirm_expires);

        if ($forClient) {
            return $url->getPath() . '?' . $url->getQuery();
        }

        return $url->__toString();
    }

    public function toCreatedSmsText(): string
    {
        return (new SmsTemplateMail($this))->getText();
    }

    public function isQuote(): bool
    {
        return in_array($this->status, array_keys(self::getQuoteStatusesMap()))
            || (in_array($this->deleted_with_status, array_keys(self::getQuoteStatusesMap())) && !is_null($this->deleted_with_status));
    }

    public function isOrder(): bool
    {
        return in_array($this->status, array_keys(self::getOrderStatusesMap()))
            || (in_array($this->deleted_with_status, array_keys(self::getOrderStatusesMap())) && !is_null($this->deleted_with_status));
    }

    public function isPaid(): bool
    {
        return in_array($this->status, array_keys(self::getPaidStatusesMap()))
            || (!is_null($this->deleted_with_status) && in_array($this->deleted_with_status, array_keys(self::getPaidStatusesMap())));
    }

    /* Email Tracking */
    public function getViewEmailTrackingUrl()
    {
        return route('quote-email-tracking', [
            'quote' => $this
        ]);
    }

    public function getViewEmailTrackingImageHtml(): string
    {
        return "<img style=\"width:1px;height:1px;display:none;\" src=\"{$this->getViewEmailTrackingUrl()}\">";
    }
}
