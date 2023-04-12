@extends('template.main')
@section('konten')

{{-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
             <div class="card-title">Tambah Data Artikel</div><hr>
            </div>
            <div class="card-body">
             <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">

                </div>
             </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                  <form method="POST">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Judul Artikel</label>
                           <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="masukan judul artikel">

                       </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">isi</label>
                            <textarea type="password" name="isi" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                       <center>
                          
                        <button type="submit" class="btn btn-primary" name="simpan"> <i class="fa fa-paper-plane"></i> Submit</button>
                        </center>
                  </form>  

                </div>

            </div>
		</div>
	</div>
</div>
  --}}
  {{-- <div class="card-body">
    <tbody>
        <td style="width: 40%; vertical-align: middle;">Closes the modal after a certain amount of time (specified in ms)</td>
        <td>
            <button type="button" class="btn btn-primary" id="alert_demo_6">Show me</button>		
        </td> 
    </tbody>
  </div> --}}
 
<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Master Data</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Artikel</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Data Artikel</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Artikel</div>
                </div>
                <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">Judul Artikel</label>
                                            <input type="text" value="{{ old('judul')}}" name="judul" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="Masukkan Judul">
 
                                            @error('judul')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
 
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Upload Gambar</label>
                                            <input type="file" name="gambar" class="form-control {{ $errors->first('gambar') ? "is-invalid":""}}">
 
                                            @error('gambar')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Kategori</label>
                                        
 
                                            <select class="form-control {{ $errors->first('kategori') ? "is-invalid" : "" }}" name="kategori" id="">
                                                @foreach ($data as $item)
                                                <option hidden >pilih kategori</option>
                                                <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="comment">Isi</label>
                                    <textarea class="form-control {{ $errors->first('isi') ? "is-invalid":""}}" name="isi" rows="5"></textarea>
                                    @error('isi')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection