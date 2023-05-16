<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil avec les 6 derniers sites ajoutés par l'administrateur
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $sitesCount = Site::count();
        $sites = Site::query()->with('category')->orderBy('created_at', 'desc')->limit(6)->get();
        return view('home', ['sites' => $sites, 'sitesCount' => $sitesCount]);
    }
}
