<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Glide\Urls\UrlBuilderFactory;

/**
 * @mixin IdeHelperPicture
 */
class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    /**
     * Evènement pour Supprimer le fichier correspondant à une image supprimée
     * @return void
     */
    protected static function booted(): void
    {
        static::deleting(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    /**
     * Permet de récupérer l'URL d'une image stockée dans Storage/public
     * @param int|null $width
     * @param int|null $height
     * @return string
     */
    public function getImageUrl(?int $width = null, ?int $height = null): string
    {
        if ($width === null) {
            return Storage::disk('public')->url($this->filename);
        }
        $urlBuilder = UrlBuilderFactory::create('/images/', config('glide.key'));
        return $urlBuilder->getUrl($this->filename, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}
