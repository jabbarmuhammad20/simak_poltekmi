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
                <h5 class="card-title">Daftar Matakuliah Non Aktif</h5>

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
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $m->id }}-{{ $m->k_matkul }}</td>
                                <td>{{ $m->nama_matakuliah }}</td>
                                <td>{{ $m->semester }}</td>
                                <td>{{ $m->sks }}</td>
                                <td>{{ $m->programstudi[0]->programstudi}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#largeModal{{$m->id}}">
                                        <i class="bi bi-unlock"></i>
                                    </button>
                        
                                      <div class="modal fade" id="largeModal{{$m->id}}" value="{{$m->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <form action="{{route('admin.update.matkul',$m->id)}}" method="post" class="f1">
                                                @csrf
                                                @method( 'PUT' )
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Edit Matakuliah</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                      <form class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Kode Matakuliah</label>
                                                            <input type="text" class="form-control" id="inputName5" name="k_matkul" value="{{$m->k_matkul}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                          <label for="inputName5" class="form-label">Matakuliah</label>
                                                          <input type="text" class="form-control" id="inputName5" name="nama_matakuliah" value="{{$m->nama_matakuliah}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Program Studi</label>
                                                            <select class="form-select"
                                                            aria-label="Default select example" name="programstudi_id">
                                                            <option selected value="{{$m->programstudi_id}}">*{{$m->programstudi[0]->programstudi}}
                                                            </option>
                                                            @foreach ($prog as $p)
                                                                <option value="{{ $p->id }}">
                                                                {{ $p->programstudi }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Dosen Pengampu</label>
                                                            <select class="form-select"
                                                            aria-label="Default select example" name="dosen_id">
                                                            <option selected value="{{$m->dosen[0]->id}}">*{{$m->dosen[0]->nama}}
                                                            </option>
                                                            @foreach ($data['dosen'] as $d)
                                                                <option value="{{ $d->id }}">
                                                                {{ $d->nama }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">SKS</label>
                                                            <input type="text" class="form-control" id="inputName5" name="sks" value="{{$m->sks}}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Semester</label>
                                                            <input type="text" class="form-control" id="inputName5" name="semester" value="{{$m->semester}}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="inputName5" class="form-label">Tahun Akademik</label>
                                                            <select class="form-select" name="tahunakademik_id"
                                                            aria-label="Default select example">
                                                                <option selected value="{{$m->tahunakademik_id}}"> <span class="error">*</span> {{$m->tahunakademik[0]->tahun_akademik}}
                                                                </option>
                                                                @foreach ($tahun_akademik as $akademik)
                                                                <option value="{{ $akademik->id}}">
                                                                {{ $akademik->tahun_akademik }}
                                                                </option>
                                                                 @endforeach
                                                            </select>
                                                        </div>

                                                        
                                                          <div class="col-md-12">
                                                            <label for="inputPassword5" class="form-label">Aktif</label>
                                                            <select class="form-select" name="aktif"
                                                                        aria-label="Default select example">
                                                                        <option selected value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                            </select>
                                                          </div>
                                                        
                                                        <div class="col-12">
                                                          <div class="form-check">
                                                            <input type="checkbox" name="kunci[]" id="readbooks" value="1">Kunci
                                                            {{-- <input type="checkbox" name="kunci[]" id="readbooks" value="1" {{ in_array('1', $m->kunci) ? 'checked' : '' }}>Kunci --}}
                                                            <label class="form-check-label" for="gridCheck">
                                                             Kunci
                                                            </label>
                                                          </div>
                                                        </div>
                                                </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </form>
                                        </div>
                                    </div><!-- End Large Modal-->
                                   
                                    <a href="{{ route('admin.matkul.nilai', $m->id, $m->tahunakademik_id) }}"
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
