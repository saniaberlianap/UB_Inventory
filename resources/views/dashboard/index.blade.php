@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
  	 @if(auth()->user()->role == 'admin')
    <h1>Dashboard Admin</h1>
   </div>
   <h3>Selamat datang, {{ auth()->user()->name }}</h3>
            <p>
              <br>
     <div class="row">
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('fakultas.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Fakultas</h4>
                  </div>
                  <div class="card-body">
                    {{ $fakultas }}
                  </div>
                </div>
              </div>
            </div>
        </a>
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('jurusan.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jurusan</h4>
                  </div>
                  <div class="card-body">
                    {{ $jurusan }}
                  </div>
                </div>
              </div>
            </div>
        </a>
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           	<a href="{{ route('ruangan.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Ruangan</h4>
                  </div>
                  <div class="card-body">
                    {{ $ruangan }}
                  </div>
                </div>
              </div>
            </div>
        </a>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          	<a href="{{ route('barang.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Barang</h4>
                  </div>
                  <div class="card-body">
                   {{ $barang }}
                  </div>
                </div>
              </div>
            </div>
        </a>
          </div>



    @else
    <h1>Dashboard Staff</h1>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-12">
  <h3>Selamat datang, {{ auth()->user()->name }}</h3>
  <p>
    <br>
            <a href="{{ route('barang.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Barang</h4>
                  </div>
                  <div class="card-body">
                   
                  </div>
                </div>
              </div>
            </div>
        </a>

    @endif

 
</section>
@endsection()