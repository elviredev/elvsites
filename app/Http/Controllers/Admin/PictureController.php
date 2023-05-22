<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Supprimer une image
     * @param Picture $picture
     * @return string
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return '';
    }
}
