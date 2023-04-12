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
                <a href="{{ route('artikel')}}">Data Artikel</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                 Detail Artikel : {{ $show['judul_artikel']}}
            </li>
        </ul>
    </div>


      <div class="row">
         <div class="col-md-12"> 
            <div class="card">
               <div class="card-header">
                   <div class="page-title">Detail Artikel</div>
                   <div class="card-body">
                    <center>
                    <img src="{{ asset('upload/'.$show['gambar']) }}" alt="">
                     <h3 class="pt-3 page-title">Judul Artikel : {{ $show['judul_artikel']}}</h3>
                    </center>
                      <p align="justify">
                          {{ $show['isi'] }}
                      </p>
                   </div>
                </div>
            </div>    
         </div>
       </div>
</div>
@endsection
