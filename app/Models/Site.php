<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

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

    /**
     * Relation n-n (many to many) : 1 article peut avoir plusieurs technos
     * Une techno peut être utilisée par plusieurs sites
     * @return BelongsToMany
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    /**
     * Générer un slug de manière auto à partir du nom
     * Utiliser le helper Str de Laravel
     * @return string
     */
    public function getSlug(): string
    {
        return Str::slug($this->name);
    }

    /**
     * Relation 1-n : un site peut avoir 1 ou plusieurs img
     * @return HasMany
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * Stocker les fichiers dans un dossier, créer les images associées et lier les images au site
     * @param UploadedFile[] $files
     * @return void
     */
    public function attachFiles(?array $files)
    {
        $pictures = [];
        if ($files) {
            foreach ($files as $file) {
                if ($file->getError()) {
                    continue;
                }

                $filename = $file->store('sites/'.$this->id, 'public');

                $pictures[] = [
                    'filename' => $filename
                ];
            }
        }

        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function getPicture(): ?Picture
    {
        return $this->pictures[0] ?? null;
    }
}
