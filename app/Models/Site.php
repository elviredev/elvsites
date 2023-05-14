<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperSite
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'year',
      'client',
      'url_site',
      'published',
      'github',
      'category_id'
    ];

    /**
     * Cet article est associé à 1 catégorie
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
