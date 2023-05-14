<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Une catégorie peut avoir plusieurs sites
     * @return HasMany
     */
    public function sites(): HasMany
    {
        return $this->hasMany(Site::class);
    }
}
