<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::orderBy('nama')->get();

        return view('wisata.index', compact('wisatas'));
    }
}
