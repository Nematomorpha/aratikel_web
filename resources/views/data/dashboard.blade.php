@extends('template.main')
@section('konten')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Selamat Datang,  {{ Auth::user()->name }}</h2>
                <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Daily information about statistics in system</div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-tags"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title">{{$kategori}}</h4>
                                                <p class="card-category">Data Kategori</p>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-book"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
                                        
											   <div class="numbers">
                                                <h4 class="card-title">{{$artikel}}</h4>    
												 <p class="card-category">Data Artikel</p>
											   </div>
                                        
										</div>
									</div>
								</div>
							</div>
                       </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total income & spend statistics</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                <h3 class="fw-bold">$9.782</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                <h3 class="fw-bold">$1,248</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-container">
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
	<div class="row ml-2">
		<div class="col-md-4">
            
                
                        <div class="card card-profile">
                            <div class="card-header" style="background-image: url('{{ asset('vendor') }}/examples/assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('vendor') }}/examples/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ Auth::user()->name }}</div>
                                    <div class="job">Frontend Developer</div>
                                    <div class="desc">A man who hates loneliness</div>
                                   
                                    <div class="view-profile">
                                        <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    
                
                
           </div>
            
		
		<div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ubah Data Profil</div>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jd">nama user</label>
                                                    <input type="text" value="{{ old('judul')}}" name="judul" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="">
         
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jd">email</label>
                                                    <input type="text" value="{{ old('judul')}}" name="email" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="">
         
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jd">Password</label>
                                                    <input type="text" value="{{ old('judul')}}" name="Password" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="">
         
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jd">Konfirmasi Password</label>
                                                    <input type="text" value="{{ old('judul')}}" name="Password" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd" placeholder="">
         
                                                    
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
                
        </div>     
            
	</div>
	
</div>

@endsection