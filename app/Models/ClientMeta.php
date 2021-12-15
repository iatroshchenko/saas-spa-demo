<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMeta extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id',
      'type',
      'company',
      'address_1',
      'address_2',
      'zip',
      'city',
      'state',
      'phone_2',
      'mobile',
      'fax',
      'notes_from_shipper'
    ];
}
