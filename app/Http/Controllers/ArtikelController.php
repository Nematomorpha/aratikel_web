<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
//langkah 1
// include model nya dulu
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class ArtikelController extends Controller
{
 
    public $artikel;
    // membuat instance dari model artikel
    public function __construct()
    {
       $this->artikel = new Artikel;
       $this->middleware(function ($request, $next){
        if (Gate::allows('admin')) return $next($request);
        abort(403);
       });
       

    }
 
    public function index(Request $request)
    {
       
        // dd($cari);
        //sama persis kaya "select * ......"
        // $data = Artikel::all();
        //sintaxs relasi query builde
        

        //sintaxs eloquent
         //$data = Artikel::all();


        //tampil
        //kitaa membatasi data yang akan tampil
        //$batas adalah tampilan jumlah maksimal dalam satu page
        $batas = 2;
        // $data = Artikel::simplePaginate($batas);
        $data= DB::table('artikels')
        ->join('kategori','artikels.kategori_id','=','kategori.id_kategori')
        ->select('artikels.*','kategori.*')->paginate($batas);
        $no = $batas * ($data->currentPage() - 1);
        $cari = $request->search;
        // $data = Artikel::where('judul_artikel', 'LIKE', "%$cari%")->simplePaginate($batas);
        
        $data= DB::table('artikels')
        ->join('kategori','artikels.kategori_id','=','kategori.id_kategori')
        ->select('artikels.*','kategori.*')
        ->where('artikels.judul_artikel', 'LIKE', "%$cari%")
        ->orWhere('kategori.kategori', 'LIKE', "%$cari%")
        ->paginate($batas)->withQueryString();

        return view('artikel.index', compact('data', 'no'));
 
 
    }
 
    public function create()
    {
       $data = Kategori::all();
       
       return view('artikel.create', compact('data'));
    }
 
 
    public function store(Request $request)
    {
        //nangkep kiriman user dari form
        // dd($request->all());
 
        //opsi 1 validasi data
        // $validate = Validator::make($request->all(),[
        //     'judul' => 'required',
        //     'gambar' => 'required',
        //     'isi' => 'required'
        // ])->validate();
 
        //opsi ke 2 validasi data
        $rules = [
            'judul' => 'required|min:3|max:30',
            'gambar' => 'required|max:500|mimes:jpg,png,jpeg',
            'isi' => 'required'
        ];
 
        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
            'mimes' => "ekstensi file tidak di izinkan"
 
        ];
 
        $this->validate($request, $rules, $messages);
 
        //tangkap request user
        $nm = $request->gambar;
 
        //ubah nama file yang akan disimpan kedalam DB
        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
 
        $this->artikel->judul_artikel = $request->judul;
        $this->artikel->isi = $request->isi;
        $this->artikel->gambar = $namaFile;
        $this->artikel->kategori_id = $request->kategori;
        //simpan file gambar ke direktori upload yang ada didalam public
        $nm->move(public_path() . '/upload', $namaFile);
 
        // simpan data menggunakan method save()
        $this->artikel->save();
 
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('artikel')->with('status', 'Data artikel berhasil ditambahkan');
    }
 
    public function show($id)
    {
        //ini variabel nampung id
        $show = Artikel::findorFail($id);
        // 
        return view('artikel.show', compact('show'));

    }





 
 
    public function edit($id)
    {
        $edit = Artikel::findorFail($id);
        $data = Kategori::all();
       
        //
        return view('artikel.edit', compact('edit','data'));

    }
 
    public function update(Request $request, $id)
    {
        $update = Artikel::findOrFail($id);
 
        // if ($update->gambar == null) {
        //     echo "gambar kosong";
        // }
        //dd($update);
        $update->judul_artikel = $request->judul;
        $update->isi = $request->isi;
        $update->kategori_id = $request->kategori;
 
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
        return redirect()->route('artikel')->with('status','Data artikel berhasil di update');
 
    }
 
 
    public function destroy($id)
    {
        //
        $destroy = Artikel::findOrFail($id);
        // dd($show);
        
        $path = 'upload/'.$destroy->gambar;
        
        if ($destroy->gambar) {
            if(File::exists($path))
            {
                File::delete($path);
                
            }
        }

        $destroy->delete();
        return redirect()->route('artikel')->with('status', 'Data artikel berhasil dihapus'); 
    }
}
