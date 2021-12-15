<?php

namespace App\Models;

use App\Repository\PersonalAccessTokenRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShipperSetting
 * @package App\Models
 */
class Setting extends Model
{
    use HasFactory;

    const SETTING_KEY_LOGO = 'logo';

    protected $fillable = [
        'entity_id',
        'entity_type',
        'key',
        'value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity()
    {
        return $this->morphTo();
    }
}
