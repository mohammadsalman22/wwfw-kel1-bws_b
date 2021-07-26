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
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 ml-3 text-gray-800">Riwayat</h1>
            <a href="{{ route('riwayat.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> + Tambah Data Baru</a>
    </div> --}}

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('Berhasil'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
                @endif
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Wisata</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Nama Wisata</th>
                          <th>Nama Pengguna</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($wisata as $item)
                          <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ Auth::user()->name }}</td>
                            <td class="text-center">{{ ucwords($item->nama_wisata) }}</td>
                            <td class="text-center">{{ ucwords($item->nama) }}</td>
                            <td class="text-center">{{ $item->jumlah_pesan }}</td>
                            <td class="text-right">Rp. {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                            <td class="text-center">{{ $item->status == 'Berhasil' ? 'Diterima' : ($item->status == 'Gagal' ? 'Ditolak' : 'Menunggu') }}</td>
                            <td>
                                @if ($item->status == 'Menunggu')
                                <div class="form-inline p-0">
                                    <form action="{{ route('riwayat.update', $item->kode_booking) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="Berhasil">
                                        <button type="button" class="btn btn-success" title="Terima" data-toggle="tooltip" onclick="confirm('{{ __("Apakah anda yakin ingin menerima ?") }}')? this.parentElement.submit() : ''">
                                            Terima
                                        </button>
                                    </form>
                                    <form action="{{ route('riwayat.update', $item->kode_booking) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="Gagal">
                                        <button type="button" class="btn btn-danger" title="Tolak" data-toggle="tooltip" onclick="confirm('{{ __("Apakah anda yakin ingin menolak ?") }}')? this.parentElement.submit() : ''">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                                @else
                                <center>-</center>
                                @endif
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

    <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Travel & Homestay</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Nama Travel / Homestay</th>
                      <th>Nama Pengguna</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($travelhomestay as $item)
                      <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ ucwords($item->nama) }}</td>
                        <td class="text-center">{{ ucwords($item->nama_travel_homestay) }}</td>
                        <td class="text-center">{{ ucwords($item->nama) }}</td>
                        <td class="text-center">{{ $item->jumlah_pesan }}</td>
                        <td class="text-right">Rp. {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                        <td class="text-center">{{ $item->status == 'Berhasil' ? 'Diterima' : ($item->status == 'Gagal' ? 'Ditolak' : 'Menunggu') }}</td>
                        <td>
                            @if ($item->status == 'Menunggu')
                            <div class="form-inline p-0">
                                <form action="{{ route('riwayat.update', $item->kode_booking) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="Berhasil">
                                    <button type="button" class="btn btn-success" title="Terima" data-toggle="tooltip" onclick="confirm('{{ __("Apakah anda yakin ingin menerima ?") }}')? this.parentElement.submit() : ''">
                                        Terima
                                    </button>
                                </form>
                                <form action="{{ route('riwayat.update', $item->kode_booking) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="Gagal">
                                    <button type="button" class="btn btn-danger" title="Tolak" data-toggle="tooltip" onclick="confirm('{{ __("Apakah anda yakin ingin menolak ?") }}')? this.parentElement.submit() : ''">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                            @else
                            <center>-</center>
                            @endif
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
