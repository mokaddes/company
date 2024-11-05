<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;
    protected $table = "vcards";

    protected $fillable = [
        'user_id',
        'url_alias',
        'default_language_code',
        'template_id',
        'status',
        'first_name',
        'last_name',
        'phone',
        'email',
        'occupation',
        'description',
        'location',
        'company',
        'job_title',
        'dob',
        'font_size',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'google_analytics',
        'enable_enquiry_form',
        'cover_image',
        'profile_image',
        'total_view',
        'total_contact_saved',
        'paypal_account',
    ];

    public function icons(): HasOne
    {
        return $this->hasOne(SocialIcon::class, 'vcard_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function analytics():HasMany
    {
        return $this->hasMany(CardAnalytic::class,'vcard_id','id');
    }
    public function enquiries():HasMany
    {
        return $this->hasMany(Inquiry::class,'vcard_id','id');
    }

}
