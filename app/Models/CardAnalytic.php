<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardAnalytic extends Model
{
    use HasFactory;
    protected $table='vcard_analytics';

    protected $fillable = [
        'session',
        'vcard_id',
        'uri',
        'source',
        'country',
        'browser',
        'device',
        'operating_system',
        'ip',
        'language',
        'meta',
    ];
}
