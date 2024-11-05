<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'vcard_enquiries';

    protected $fillable = [
        'vcard_id',
        'name',
        'email',
        'phone',
        'message',
        'job_title',	
        'company_name'

    ];

    protected $casts = [
        'vcard_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'message' => 'string',
        'job_title' => 'string',
        'company_name' => 'string',
    ];

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'vcard_id');
    }
}
