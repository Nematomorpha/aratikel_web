@extends('template.main')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Artikel : {{ $edit['judul_artikel']}}</div>
            </div>
            <form action="{{ route('artikel.update',$edit['id']) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                                    <label for="jd">Judul Artikel</label>
                                                    <input type="text" value="{{ $edit['judul_artikel']}}" name="judul" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="{{ $edit['judul_artikel']}}">

                                                    @error('judul')
                                                    <small class="text-danger">
                                                            {{ $message }}
                                                    </small>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="jd">Kategori</label>
                                            <select class="form-control {{ $errors->first('kategori') ? "is-invalid" : "" }}" name="kategori" id="">
                                                @foreach ($data as $item)
                                                <option  hidden >pilih kategori</option>
                                                <option  @if($item->id_kategori==$edit['kategori_id'])
                                                    {{"selected"}}
                                                @endif
                                                 value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror`
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p for="password">Upload Gambar</p> 
                                        @if ($edit['gambar'])
                                            
                                       
                                        <img style="width: 20%" src="{{ asset('upload/'.$edit['gambar']) }}" alt="">
                                        <input style="height: 150px;" type="file" name="gambar" class="form-control {{ $errors->first('gambar') ? "is-invalid":""}}">
                                        <small class="text-danger">kosongkan jika tidak ingin mengubah gambar</small>
                                        @else
                                        <input style="height: 150px;" type="file" name="gambar" class="form-control {{ $errors->first('gambar') ? "is-invalid":""}}">
                                        @error('gambar')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        @endif
                                    </div>
                                </div>
                              
                                
                            </div>
                            <div class="form-group">
                                <label for="comment">Isi</label>
                                <textarea class="form-control {{ $errors->first('isi') ? "is-invalid":""}}" name="isi" rows="5">{{$edit['isi']}}</textarea>
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
                    <button type="submit" class="btn btn-secondary"> <i class="icon-refresh"></i> Update</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
