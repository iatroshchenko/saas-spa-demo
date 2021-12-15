<?php


namespace App\Models\Shipper;


use App\Concerns\Model\UsesPublicUuid;
use App\Models\Shipper;
use App\TemplateMail\CredentialsTemplateMail;
use App\TemplateMail\EmailChangeVerificationTemplateMail;
use App\TemplateMail\EmailVerificationTemplateMail;
use App\TemplateMail\OrderTemplateMail;
use App\TemplateMail\QuoteDraftTemplateMail;
use App\TemplateMail\QuoteTemplateMail;
use App\TemplateMail\SmsTemplateMail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\MailTemplates\Models\MailTemplate;

class ShipperMailTemplate extends MailTemplate
{
    use UsesPublicUuid;

    const TYPE_QUOTE = 'quote';
    const TYPE_CREDENTIALS = 'credentials';
    const TYPE_ORDER = 'order';
    const TYPE_QUOTE_DRAFT = 'quote-draft';
    const TYPE_EMAIL_VERIFICATION = 'email-verification';
    const TYPE_EMAIL_CHANGE_VERIFICATION = 'email-change-verification';
    const TYPE_SMS = 'sms';

    const TYPE_TO_MAILABLE_MAP = [
        self::TYPE_QUOTE => QuoteTemplateMail::class,
        self::TYPE_CREDENTIALS => CredentialsTemplateMail::class,
        self::TYPE_ORDER => OrderTemplateMail::class,
        self::TYPE_QUOTE_DRAFT => QuoteDraftTemplateMail::class,
        self::TYPE_EMAIL_VERIFICATION => EmailVerificationTemplateMail::class,
        self::TYPE_EMAIL_CHANGE_VERIFICATION => EmailChangeVerificationTemplateMail::class,
        self::TYPE_SMS => SmsTemplateMail::class
    ];

    public static function typeToMailable(string $type): ?string
    {
        return self::TYPE_TO_MAILABLE_MAP[$type] ?? null;
    }

    public static function mailableToType(string $mailable): ?string
    {
        $reverse = collect(self::TYPE_TO_MAILABLE_MAP)
            ->flip()
            ->toArray();

        return $reverse[$mailable] ?? null;
    }

    public static function getDefaultTemplatesMap(): array
    {
        return [
            QuoteTemplateMail::class => [
                'name' => 'Quote Email Template',
                'path' => resource_path('views/emails/default_templates/quote.blade.php'),
                'subject' => 'Quote'
            ],
            CredentialsTemplateMail::class => [
                'name' => 'Credentials Email Template',
                'path' => resource_path('views/emails/default_templates/credentials.blade.php'),
                'subject' => 'Credentials'
            ],
            EmailChangeVerificationTemplateMail::class => [
                'name' => 'Email Change Verification Email Template',
                'path' => resource_path('views/emails/default_templates/email_change_verification.blade.php'),
                'subject' => 'Email Change Verification'
            ],
            QuoteDraftTemplateMail::class => [
                'name' => 'Quote Draft Email Template',
                'path' => resource_path('views/emails/default_templates/quote_draft.blade.php'),
                'subject' => 'Quote Draft'
            ],
            SmsTemplateMail::class => [
                'name' => 'Sms Template',
                'path' => resource_path('views/emails/default_templates/sms.blade.php'),
                'subject' => 'Sms Notification'
            ],
            EmailVerificationTemplateMail::class => [
                'name' => 'Email Verification Email Template',
                'path' => resource_path('views/emails/default_templates/email_verification.blade.php'),
                'subject' => 'Email Verification'
            ]
            // Order email template
        ];
    }

    /**
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function scopeForMailable(Builder $query, Mailable $mailable): Builder
    {
        return $query
            ->where('mailable', get_class($mailable))
            ->where('shipper_id', $mailable->getShipper()->id)
            ->where('is_active', true);
    }

    public static function getVariablesByType(): array
    {
        return [
            self::TYPE_QUOTE => QuoteTemplateMail::getVariables(),
            self::TYPE_CREDENTIALS => CredentialsTemplateMail::getVariables(),
            self::TYPE_ORDER => OrderTemplateMail::getVariables(),
            self::TYPE_QUOTE_DRAFT => QuoteDraftTemplateMail::getVariables(),
            self::TYPE_EMAIL_VERIFICATION => EmailVerificationTemplateMail::getVariables(),
            self::TYPE_EMAIL_CHANGE_VERIFICATION => EmailChangeVerificationTemplateMail::getVariables(),
            self::TYPE_SMS => SmsTemplateMail::getVariables()
        ];
    }
}
