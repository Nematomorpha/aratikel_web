<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ApiArtikelController extends Controller
{
 
    public function index()
    {
        //
        $data = Artikel::all();
        return response()->json([
            "status" => true,
            "message" => "Data Artikel",
            "data" => $data
        ], 200);

    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'artikel' => 'required',
            'isi'     => 'required',
            'gambar'  =>  'required|max:500|mimes:jpg,png,jpeg',
            'kategori_id' => 'required',

        ]);

        //bikin logika kalau validasinya bermasalah
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $nm = $request->gambar;
 
        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
 


        $simpan = Artikel::create([
            //susunanya adalah
            //nama field DB => name form
        'judul_artikel' => $request->artikel,
        'isi' => $request->isi,
        'gambar'=> $namaFile,
        'kategori_id'=>$request->kategori_id
        ]);

        $nm->move(public_path() . '/upload', $namaFile);
        
       
        //bikin respon JSON kalau Berhasil input data
        if ($simpan) {
            return response()->json([
                "status" => true,
                "message" => "Data artikel berhasil ditambahkan",
                "data" => $simpan
            ], 201);
        }
    }

  
    public function show($id)
    {
        $show = Artikel::findOrFail($id);
        return response()->json([
            "status" => true,
            "message" => "Data artikel",
            "data" => $show
        ], 200);
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(),[
            'artikel' => 'required',
            'isi'     => 'required',
            'gambar'  =>  'required|max:500|mimes:jpg,png,jpeg',
            'kategori_id' => 'required',
        ]);

        //bikin logika kalau validasinya bermasalah
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $update = Artikel::findOrFail($id);
        $update->judul_artikel = $request->artikel;
        $update->isi = $request->isi;
        $update->kategori_id = $request->kategori_id;
 
        // 12345678.jpg
        $gambarLama =  $update->gambar;
        if (!$request->gambar) {
            $update->gambar = $gambarLama;
        }else{
            //buat nyari nama file yang ada di folder upload
            if ($update->gambar) {
                $path = 'upload/'.$update->gambar;
                if(File::exists($path))
                {
                    File::delete($path);
                    $nm = $request->gambar;
                    $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                    $update->gambar = $namaFile;
                    $nm->move(public_path() . '/upload', $namaFile);
                }
            }elseif($request->gambar != $gambarLama){
            // echo "gambar isinya beda";
            $nm = $request->gambar;
            //ubah nama file yang akan disimpan kedalam DB
            $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
            $update->gambar = $namaFile;
            $nm->move(public_path() . '/upload', $namaFile);
            }
        }
 
        $update->save();

            return response()->json([
            "status" => true,
            "message" => "Data Artikel Berhasil di Ubah",
            "data" => $update
            ], 200);
        

    
 
    }


    public function destroy($id)
    {
        $delete = Artikel::findOrFail($id);
        $path = 'upload/'.$delete->gambar;

        if ($delete->gambar) {
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $delete->delete();
           return response()->json([
                "status" => true,
                "message" => "Data articles Berhasil di hapus",
                "data" => $delete
            ], 200);
        
    }
}
