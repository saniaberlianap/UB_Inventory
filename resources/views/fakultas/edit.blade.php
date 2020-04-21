@extends('layouts.adminmain')
@section('title', 'Edit Data Fakultas')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Fakultas <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
     @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('fakultas.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('fakultas.update', ['id_fakultas' => $data->id_fakultas]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" value="{{ $data->nama_fakultas }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()