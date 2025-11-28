<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $table = 'home_page_contents';

    protected $casts = [
        'banner_section' => 'int',
        'about_section' => 'int',
        'client_section' => 'int',
        'contact_section' => 'int',
    ];
}
