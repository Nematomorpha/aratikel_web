<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApiKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return response()->json([
            "status" => true,
            "message" => "Data Kategori",
            "data" => $data
        ], 200);

        //untuk menampilkan seluruh data kategori menggunakan api

    }

  
    public function create()
    {
        //

    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_kategori' => 'required',
        ]);

        //bikin logika kalau validasinya bermasalah
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $simpan = Kategori::create([
            //susunanya adalah
            //nama field DB => name form
            'kategori' => $request->nama_kategori
        ]);

        //bikin respon JSON kalau Berhasil input data
        if ($simpan) {
            return response()->json([
                "status" => true,
                "message" => "Data Kategori",
                "data" => $simpan
            ], 201);
        }
    }

  
    public function show($id)
    {
        
        $show = Kategori::findOrFail($id);
        return response()->json([
            "status" => true,
            "message" => "Data Kategori",
            "data" => $show
        ], 200);
        //ini untuk menampilkan api dengan memanggil id
        
       
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_kategori' => 'required',
        ]);

        //bikin logika kalau validasinya bermasalah
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $update = Kategori::findOrFail($id);
        if ($update) {
            $update->update([
                //nama field db -> name form
                'kategori' =>$request->nama_kategori
            ]);

            return response()->json([
            "status" => true,
            "message" => "Data Kategori",
            "data" => $update
            ], 200);
        }



        //
        // $simpan = Kategori::create([
        //     //susunanya adalah
        //     //nama field DB => name form
        //     'kategori' => $request->nama_kategori
        // ]);

        // //bikin respon JSON kalau Berhasil input data
        // if ($simpan) {
        //     return response()->json([
        //         "status" => true,
        //         "message" => "Data Kategori",
        //         "data" => $simpan
        //     ], 201);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Kategori::findOrFail($id);

        if ($delete) {
            $delete->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Kategori Berhasil di hapus",
            ], 200);
        }
        //
    }
}
