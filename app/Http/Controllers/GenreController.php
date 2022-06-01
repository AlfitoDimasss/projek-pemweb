<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function indexAction()
    {
        $data = [
            'komiks' => genre::where('id', 1)->first()->komiks,
            'title' => 'Action Comics'
        ];
        return view('halaman-komik-per-genre', $data);
    }

    public function indexAdventure()
    {
        $data = [
            'komiks' => genre::where('id', 2)->first()->komiks,
            'title' => 'Adventure Comics'
        ];
        return view('halaman-komik-per-genre', $data);
    }

    public function indexDrama()
    {
        $data = [
            'komiks' => genre::where('id', 3)->first()->komiks,
            'title' => 'Drama Comics'
        ];
        return view('halaman-komik-per-genre', $data);
    }
}
