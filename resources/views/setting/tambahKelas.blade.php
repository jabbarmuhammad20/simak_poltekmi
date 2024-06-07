@extends('layouts.dashboard')
@section('content')
<div class="pagetitle">
    <h1>{{ $data['title'] }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ $data['title'] }}</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ruang Kelas
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importnilai">
                        Tambah Kelas
                      </button></h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ruang Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['kelas'] as $index => $k )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $k->ruangkelas }}</td>
                                <td>{{ $k->namakelas}}</td>
                                <td>
                                    <a href="#" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>


        <div class="modal fade" id="importnilai" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"> Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{route ('admin.pengaturankelas')}}" method="post" class="f1">
                @csrf
                @method( 'POST' )
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Kode Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="kode" >
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Ruang Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ruangkelas" >
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="namakelas">
                    </div>
                </div>
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cloud-upload-fill"></i>
                    Simpan </button>
            </form>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->

@endsection
