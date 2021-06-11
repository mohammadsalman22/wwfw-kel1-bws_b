@extends('backend.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
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
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 ml-3 text-gray-800">Wisata</h1>
            <a href="{{ route('wisata.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> + Tambah Data Baru</a>
    </div>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
                </div>
                <div class="card-body">
                  @if ($message = Session::get('Berhasil'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                  @endif
                  <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr> 
                          <th>No</th>
                          <th>Nama Wisata</th>
                          <th>Alamat Wisata</th>
                          <th>Gambar Wisata</th>
                          <th>Deskripsi Wisata</th>
                          <th>Harga Wisata</th>
                          <th>Tag</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($wisata as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_wisata }}</td>
                            <td>{{ $item->alamat_wisata }}</td>
                            <td>
                                <a data-toggle="modal" class="showDetailData" data-target=".modal-show-detail" data-image=" {{ url(''.$item->gambar_wisata) }}">
                                    <img src="{{ url(''.$item->gambar_wisata) }}" alt=" {{ $item->name }}" width="200" height="300">
                                </a>
                                {{ $item->name }}
                            </td>
                            <td>{{ $item->deskripsi_wisata }}</td>
                            <td class="text-right">Rp. {{number_format ($item->harga_wisata, 2) }}</td>
                            <td> {{ $item->tag }} </td>
                            <td>
                                <div class="form-inline p-0">
                                    <a href="{{ route('wisata.edit',$item->id_wisata) }}" class="btn btn-success mr-2" title="Edit" data-toggle="tooltip"> <span class="fa fa-pen"></span> </a>
                                    <form action="{{ route('wisata.destroy', $item->id_wisata) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="tooltip" onclick="confirm('{{ __("Apakah anda yakin ingin menghapus ?") }}')? this.parentElement.submit() : ''">
                                            <span class="fa fa-minus-circle"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  </div>
                </div>
            </div>
        </div>
    </div>



<div class="col-xl-4 col-md-6 mb-4">
    </section>
    <!-- /.content -->
</div>
@endsection
