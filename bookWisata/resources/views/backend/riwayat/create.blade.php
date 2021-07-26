@extends('backend.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      {{-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid --> --}}
    </div>
    <!-- /.content-header -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 ml-3 text-gray-800">Metode Pembayaran</h1>
            <a href="{{ route('metode.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Lihat Semua Data</a>
    </div>

    @if ($errors->any())
        <div class=" alert alert-danger">
            <strong>Whoops!</strong> Terdapat kesalahan pada input anda.<br><br> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error}} </li>
                @endforeach
            </ul>
        </div>    
    @endif

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Metode Pembayaran</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('metode.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_tujuan">Nomer Tujuan</label>
                        <input class="form-control" type="number" step="any" class="form-control" id="no_tujuan" name="no_tujuan" placeholder="Masukkan Nomer Tujuan">
                    </div>
                    <input type="submit" value="simpan" class="btn btn-primary"></td>
                </form>
                </div>
            </div>
        </div>
    </div>



<div class="col-xl-4 col-md-6 mb-4">
    </section>
    <!-- /.content -->
</div>
@endsection
