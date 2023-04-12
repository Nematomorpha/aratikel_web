<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
//langkah 1
// include model nya dulu
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public $kategori;
    public function __construct()
    {
       $this->kategori = new Kategori;
       $this->middleware('auth');
    }
    public function index()
    {
        //sama persis kaya "select * ......"
        $data = Kategori::all();
        //cek query jalan atau gak
        //dump and die = var_dump
       // dd($data);
       return view('kategori.index', compact('data'));
    }
    public function create()
    {
       return view('kategori.create');
    }
    public function store(Request $request)
    {
     //ini opsi validate 2
     $rules = [
        'kategori' => 'required|min:3|max:40|unique:kategori,kategori'
      

    ];

    $messages = [
        'required' => ":attribute ga boleh kosong",
        'min' => ":attribute minimal 3",
        'max' => ":attribute maksimal 20",
        'unique' => ":attribute sudah tersedia, silahkan input lain"
       

    ];
    $this->validate($request, $rules, $messages);
    $this->kategori->kategori = $request->kategori;
     
    // simpan data menggunakan method save()
    $this->kategori->save();
   
    // Alert::success('Create Succes', 'Data kategori berhasil di tambahkan'); 
    // redirect halaman serta kirimkan pesan berhasil
    return redirect()->route('kategori')->with('status', 'Data kategori berhasil ditambahkan'); 
    
    //
    }

    public function edit($kategori)
    {
        $edit = Kategori::findorFail($id);
        //
        return view('kategori.edit', compact('edit'));

    }

    public function update(Request $request, $id)
    {


        $update = Kategori::findOrFail($id);
        $update->kategori = $request->judul;

        // periksa apakah ada perubahan data
        if ($update->isDirty()) {

            $rules = [
                'judul' => 'required|min:3|max:20|unique:kategori,kategori',
            ];

            $messages = [
                'unique' => ":attribute sudah tersedia, silakan input lain",
                'required' => ":attribute gak boleh kosong",
                'min' => ":attribute kurang banyak",
                'max' => ":attribute kebanyakan / ukuran file terlalu besar",
            ];

            $this->validate($request, $rules, $messages);
            $update->save();
            return redirect()->route('kategori')->with('status', 'Data kategori berhasil diupdate');
            
        } else {
            return redirect()->route('kategori');
        }
    }

    public function destroy($id)
    {
        //
        $destroy = Kategori::findOrFail($id);
        // dd($show);
        $destroy->delete();
        return redirect()->route('kategori')->with('status', 'data ategori berhasil dihapus'); 
    }
 
}
