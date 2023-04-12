<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    //ini kalau gak mau pakai konsep plural dan singular
    //protected $table = "artikel";

    //ini buat ngasih tau laravel kalu prmary key table nya ini\
    //protected $primaryKey = 'flight_id';
    
    // protected $fillable =[
    //     'judul_artikel',
    //     'isi',
    //     'gambar'
    // ];

    protected $guarded = [];

public function kategori()
{
    return $this->belongsTo(Kategori::class,'kategori_id','id_kategori');
} 

// public function mahasantri()
// {
//     return $this->belongsTo(Kategori::class,'kategori_id','id_kategori');
// }


    
        // protected $guarded =[];



}
