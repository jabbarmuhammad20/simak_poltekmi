@extends('layouts.dashboard')

@section('content')

<div class="pagetitle">
    <h1>{{ $data['title'] }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">{{ $data['title'] }}</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importnilai">
                        Import Nilai
                      </button></h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Matakuliah</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['nilai'] as $index => $m )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $m->user->name }}</td>
                                <td>{{ $m->mahasiswa->npm }}</td>
                                <td>{{ $m->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $m->nilai }}</td>
                                <td>
                                    @if ($m->kunci == '1')
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#kunci{{$m->id}}"><i class="bi bi-lock"></i>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#kunci{{$m->id}}"><i class="bi bi-unlock"></i>
                                    </button>
                                    @endif
                                    <div class="modal fade" id="kunci{{$m->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{route('admin.input.nilai',$m->id)}}" method="post" class="f1">
                                                    @csrf
                                                    @method( 'PUT' )
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> Nilai Sudah Terkunci</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">NPM</label>
                                                        <div class="col-sm-10">
                                                        <input type="integer" value="{{$m->Mahasiswa->npm}}" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                        <input type="integer"  value="{{$m->User->name}}" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nilai</label>
                                                        <div class="col-sm-10">
                                                        <input type="integer" name="nilai" value="{{$m->nilai}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label">Kunci</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select" aria-label="Default select example" name="kunci">
                                                                  <option value="1" selected>Ya</option>
                                                                 <option value="0">Tidak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('admin.delete.nilai',$m->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                <h5 class="modal-title"> Import Nilai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Pastikan file excel sudah benar
                  <form action="{{ route('admin.importnilai')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row mb-3">
                      <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cloud-upload-fill"></i>
                    Upload </button>
            </form>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->

@endsection
