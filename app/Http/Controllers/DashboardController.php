<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $kategori = DB::table('kategori')->count();
        $artikel = Artikel::count();
        return view('data.dashboard',compact('kategori','artikel'));
    }
}


