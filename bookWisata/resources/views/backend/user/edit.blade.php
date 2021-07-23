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
            <h1 class="h3 ml-3 text-gray-800">User</h1>
            <a href="{{ route('user.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Lihat Semua Data</a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Input User</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('user.update',$user->id_user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" value="{{ $user->username }}" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $user->nama }}" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin :</label> <br>
                            <div class="form-check form-check-inline">
                                <label for="jk">
                                    <input type="radio" value="L" id="jk" {{ $user->jk == 'L' ? 'checked' : ''}} name="jk">Laki - laki <br>
                                    <input type="radio" value="P" id="jk" {{ $user->jk == 'P' ? 'checked' : ''}} name="jk">Perempuan
                                </label>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label  for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomer Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email">
                    </div>
                    {{-- <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" value="{{ $user->foto }}"><br>
                        <img width="100px" height="100px" src="{{ url(''.$user->foto) }}" alt=" {{ $user->name }}">
                    </div> --}}
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
