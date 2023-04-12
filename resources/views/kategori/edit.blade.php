@extends('template.main')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Artikel : {{ $edit['kategori']}}</div>
            </div>
            <form action="{{ route('kategori.update',$edit['id_kategori']) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jd">judul kategori</label>
                                        <input type="text" value="{{ $edit['kategori']}}" name="judul" class="form-control {{ $errors->first('kategori') ? "is-invalid":""}}" id="jd" placeholder="{{ $edit['kategori']}}">

                                        @error('kategori')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>
                                </div>
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
