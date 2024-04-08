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
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Matakuliah</h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Smt</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Progam</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['matkul'] as $index => $m)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $m->id }}-{{ $m->k_matkul }}</td>
                                <td>{{ $m->nama_matakuliah }}</td>
                                <td>{{ $m->semester }}</td>
                                <td>{{ $m->sks }}</td>
                                <td>{{ $m->programstudi[0]->programstudi}}</td>
                                <td>
                                    @if($m->kunci == '1')
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editkunci">
                                            <i class="bi bi-lock">
                                            </i></button>
                                        <div class="modal fade" id="editkunci" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ubah Tahun Akademik</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Ubah Tahun Akademik</label>
                                                        <form action="#" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <select class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected disabled>Pilih Tahun Akademik
                                                                        </option>
                                                                        @foreach ($tahun_akademik as $akademik)
                                                                        <option value="{{ $akademik->tahun_akademik }}">
                                                                        {{ $akademik->tahun_akademik }}
                                                                    </option>
                                                                @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-cloud-upload-fill"></i>
                                                            Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End Vertically centered Modal-->

                                    @else
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#largeModal">
                                        <i class="bi bi-unlock"></i>
                                      </button>
                        
                                      <div class="modal fade" id="largeModal" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Edit Matakuliah</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                      <form class="row g-3">
                                                        <div class="col-md-12">
                                                          <label for="inputName5" class="form-label">Matakuliah</label>
                                                          <input type="text" class="form-control" id="inputName5" value="{{$m->nama_matakuliah}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Program Studi</label>
                                                            <select class="form-select"
                                                            aria-label="Default select example">
                                                            <option selected >asd
                                                            </option>
                                                            @foreach ($prog as $p)
                                                            <option value="{{ $p->programstudi }}">
                                                            {{ $p->programstudi }}
                                                        </option>
                                                    @endforeach
                                                        </select>
                                              
                                                          </div>
                                                        <div class="col-md-2">
                                                          <label for="inputEmail5" class="form-label">SKS</label>
                                                          <input type="text" class="form-control" id="inputEmail5" value="{{$m->sks}}">
                                                        </div>
                                                        <div class="col-md-2">
                                                          <label for="inputPassword5" class="form-label">Semester</label>
                                                          <input type="text" class="form-control" id="inputPassword5" value="{{$m->semester}}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputPassword5" class="form-label">Tahun Akademik</label>
                                                            <select class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected value="{{$m->tahunakademik[0]->tahun_akademik_id}}"> <span class="error">*</span> {{$m->tahunakademik[0]->tahun_akademik}}
                                                                        </option>
                                                                        @foreach ($tahun_akademik as $akademik)
                                                                        <option value="{{ $akademik->id}}">
                                                                        {{ $akademik->tahun_akademik }}
                                                                    </option>
                                                                @endforeach
                                                                    </select>
                                                          </div>
                                                          <div class="col-md-4">
                                                            <label for="inputPassword5" class="form-label">Aktif</label>
                                                            <select class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                            </select>
                                                          </div>
                                                        
                                                        <div class="col-12">
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck" name="">
                                                            <label class="form-check-label" for="gridCheck">
                                                             Kunci
                                                            </label>
                                                          </div>
                                                        </div>
                                                </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div><!-- End Large Modal-->
                                    @endif
                                    <a href="{{ route('dosen.matkul.nilai', $m->id) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-search">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
</section>



@endsection
