<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //ini kalau gak mau pakai konsep plural dan singular
    protected $table = "kategori";

    //ini buat ngasih tau laravel kalu prmary key table nya ini\
    protected $primaryKey = 'id_kategori';

    // protected $fillable =[
    //     'kategori'
    // ];

    protected $guarded = [];

    public function artikel()
    {
        return $this->hasMany(Artikel::class,'kategori_id','id_kategori');

    }
    
//  protected $fillable =[
    //     'judul_artikel',
    //     'isi',
    //     'gambar'
    // ];


    
        // protected $guarded =[];



}