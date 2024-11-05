<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Country;

class Region extends Model
{
    use HasFactory;
    protected $table    = 'regions';
    protected $fillabel = ['name', 'code', 'country_id'];

    public function country()
    {
         return $this->belongsTo(Country::class, 'country_id', 'id');
    }


}
