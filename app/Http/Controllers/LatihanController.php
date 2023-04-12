<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    //

    public function tampil()
    {
        return view('data.kategori');
    }

    public function cekID($id,$nama)
    {   //ini memakai compact
        // return view('kategori', compact('id','samsul'));

        //ini memakai array
           return view('data.kategori', [
             'samsul' => $id
           ],
           [
            'nama' => $nama
          ]
        );
    
    }
    public function index($id)
    {
        $kategori = [
            [
                'id' => 1,
                'nama_kategori' => "Olahraga"
            ],
            [
                'id' => 2,
                'nama_kategori' => "Kuliner"
            ],
            [
                'id' => 3,
                'nama_kategori' => "Terserah Rayhan"
            ],
        ];
        //untuk mengecek query nya udah sesuai apa belum
        //kategori adalah isi dari query
        // dd($kategori);
        return view('data.list', compact('kategori','id'));
    }

    //mirip fungsi create di controller resource
    public function formPost()
    {
    return view('data.form_tambah');
    }

    //mirip fungsi store
    public function simpan(Request $r)
    {

    //    dd($r->all());
    $inp_nama = $r->get('nama');
     return redirect()->route('dashboard');
//    return view('data.form_tambah');
//    return $inp_nama
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }
}


