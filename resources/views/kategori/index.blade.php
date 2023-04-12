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
                    <h4 class="page-title float-left">Data Kategori</h4>
                    <a href="{{ route('kategori.create')}}">
                        <button class="btn btn-md btn-primary btn-round float-right">
                        <i class="fas fa-plus-circle"></i> Tambah
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:70%">Nama Kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->kategori}} </td>
                                <td>
                                   <a href="{{ route('kategori.edit', $item->id_kategori)}}" style="text-decoration: none">
                                        <button type="button" class="btn btn-icon btn-round btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </button> &nbsp;
                                   </a>
                                   <a href="{{ route('kategori.destroy', $item->id_kategori)}}">
                                        <button onclick="return confirm('yakin data ini dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection