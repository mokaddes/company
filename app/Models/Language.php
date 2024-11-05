<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static where(string $string, $key)
 */
class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = ['name', 'code','icon','direction'];
}
