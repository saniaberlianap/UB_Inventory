@extends('layouts.adminmain')
@section('title', 'Index Data Barang')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
      @if($message = Session::get('success'))
          <div class="alert alert-success">
            <p> {{ $message }} </p>
          </div>
        @endif
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
           @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <div class="form-group">
            <a href="{{ route('barang.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
             <a href="cetak/export_excelBarang" class="btn btn-success my-3" target="_blank">Export Excel</a>
            <a href="cetak/export_pdfBarang" class="btn btn-success my-3" target="_blank">Export PDF</a>
          </div></div>
           
          @endif
<!-- Diajari Musavi Ardabilly Taufik -->
          <div class="card-body">
          <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>

                            <th scope="col">Nama Barang</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Rusak</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Updated by</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataBarang as $key => $barang )
                            <tr>
                                <td>{{ $dataBarang->firstItem()+$key }}</td>
                                <td>
                                  <img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="img-thumbnail" width="75"/>
                                </td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->ruangan->nama_ruangan }}</td>
                                <td>{{ $barang->total }}</td>
                                <td>{{ $barang->broken }}</td>
                                <td>
                                  @foreach($user as $userdata)
                                    @if($userdata->id == $barang->created_by)
                                      {{$userdata->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                  @foreach($user as $userdata)
                                    @if($userdata->id == $barang->updated_by)
                                      {{$userdata->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('barang.edit', ['id_barang' => $barang->id_barang]) }}">
                                        <button type="button" class="btn btn-sm btn-warning">Edit</button> </a> 
                                     @if(auth()->user()->role == 'admin')
                                    <a href="{{ route('barang.delete', ['id_barang' => $barang->id_barang]) }}"
                                    onclick="return confirm('Delete data?');" 
                                    >
                                    <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"><center>Data kosong</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            {!! $dataBarang->links() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>
</section>
@endsection()