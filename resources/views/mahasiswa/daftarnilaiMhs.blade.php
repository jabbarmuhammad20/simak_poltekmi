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
                                <th>Tahun Masuk</th>
                                <th>Program Studi</th>
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
                                <td>{{ $m->mahasiswa->tahun_masuk }}</td>
                                <td>{{ $m->mahasiswa->prog_studi }}</td>
                                <td>{{ $m->user->name }}</td>
                                <td>{{ $m->mahasiswa->npm }}</td>
                                <td>{{ $m->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $m->nilai }}</td>
                                <td>
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
