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
            <h1 class="h3 ml-3 text-gray-800">Travel atau Homestay</h1>
            <a href="{{ route('travel_homestay.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Lihat Semua Data</a>
    </div>

    @if ($errors->any())
        <div class=" alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br> 
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
                    <h6 class="m-0 font-weight-bold text-primary">Input Travel atau Homestay</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('travel_homestay.update',$travel_homestay->id_travel_homestay) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="nama_travel_homestay">Nama Travel atau Homestay</label>
                        <input type="text" class="form-control" id="nama_travel_homestay" value="{{ $travel_homestay->nama_travel_homestay }}" name="nama_travel_homestay">
                    </div>
                    <div class="form-group">
                        <label for="alamat_travel_homestay">Alamat Travel atau Homestay</label>
                        <textarea type="text" class="form-control" id="alamat_travel_homestay" name="alamat_travel_homestay">{{ $travel_homestay->alamat_travel_homestay }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar_travel_homestay">Gambar Travel atau Homestay</label>
                        <input type="file" class="form-control-file" id="gambar_travel_homestay" name="gambar_travel_homestay" value="{{ $travel_homestay->gambar_travel_homestay }}"><br>
                        <img width="100px" height="100px" src="{{ url(''.$travel_homestay->gambar_travel_homestay) }}" alt=" {{ $travel_homestay->name }}">
                    </div>
                    <div class="form-group">
                        <label  for="deskripsi_travel_homestay">Deskripsi Travel atau Homestay</label>
                        <textarea type="text" class="form-control" id="deskripsi_travel_homestay" name="deskripsi_travel_homestay">{{ $travel_homestay->deskripsi_travel_homestay }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga_travel_homestay">Harga Travel atau Homestay</label>
                        <input type="number" class="form-control" id="harga_travel_homestay" name="harga_travel_homestay" value="{{ $travel_homestay->harga_travel_homestay }}">
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" class="form-control" id="tag" value="{{ $travel_homestay->tag }}" name="tag">
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
