@extends('template.main')
@section('konten')
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
        </ul>
    </div>
 
    {{-- buat ngecek apakah variabel status ada nilainya atau gak --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-2">
                         <h4 class="page-title float-left">Data Artikel</h4>
                    </div>
                    <div class="col-md-5">
                    <a href="{{route('artikel.create')}}">
                        <button class="btn btn-md btn-primary btn-round float-right">
                        <i class="fas fa-plus-circle"></i> Tambah
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-md btn-warning btn-round ">
                        <i class="fas fa-plus-circle"></i> Impor
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-md btn-secondary btn-round ml-3">
                        <i class="fas fa-plus-circle"></i>  Ekspor
                        </button>
                    </a>
                    
                    </div>
                    <div class="col-md-5">
                        <form action="{{route('artikel')}}" method="get">
                            @csrf
                             <input style="width:80%" type="text" class="form-control d-inline" name="search">
                            <button type="submit" class="btn btn-secondary d-inline">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:20%">Judul Artikel</th>
                                <th style="width:20%">Isi</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- lakukan looping data disini --}}
                            {{-- @php
                                $no = 1;
                            @endphp --}}
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->judul_artikel}} </td>
                                <td>{{ substr($item->isi, 0, 200) . "....."}} </td>
                                <td>{{ $item->kategori}} </td>
                                <td>
                                    <div class="avatar">
                                        <img src="{{asset('upload/'.$item->gambar)}}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('artikel.show', $item->id)}}" style="text-decoration: none" >
                                       <button type="button" class="btn btn-icon btn-round btn-info">
                                           <i class="fa fa-info-circle"></i>
                                       </button> &nbsp;
                                    </a>
                                   <a href="{{ route('artikel.edit', $item->id)}}" style="text-decoration: none">
                                        <button type="button" class="btn btn-icon btn-round btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </button> &nbsp;
                                   </a>
                                   <a href="{{ route('artikel.destroy', $item->id)}}">
                                        <button onclick="return confirm('yakin data ini dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            {{-- @php
                                $no++;
                            @endphp --}}
                            @endforeach
 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="6">{{ $data->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection