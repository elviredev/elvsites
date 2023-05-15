<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTechnology
 */
class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
