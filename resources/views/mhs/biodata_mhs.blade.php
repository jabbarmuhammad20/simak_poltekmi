@extends('layouts.dashboard')

@section('content')

<div class="pagetitle">
    <h1>Biodata
    </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Biodata</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">Mahasiswa
                      
                      @if ($data['biodata'][0]->aktif == 1)
                      <span class="badge bg-primary"> <font color="white"> Aktif</font></span>
                      @else
                      <span class="badge bg-danger"> <font color="white"> Tidak Aktif</font></span>
                    @endif 
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table ">
                        <tbody>
                          <tr>
                            <td>Nama Mahasiswa</td>
                            <td>: {{ Auth::user()->name }}</td>
                          </tr>
                          <tr>
                            <td>No Induk Mahasiswa</td>
                            <td>: {{ $data['biodata'][0]->npm }}</td>
                          </tr>
                          <tr>
                            <td>Tempat & Tanggal Lahir</td>
                            <td>: {{ $data['biodata'][0]->tempat_lahir }}, {{ $data['biodata'][0]->tgl_lahir }}</td>
                          </tr>
                          <tr>
                            <td>Semester</td>
                            <td>: {{ $data['biodata'][0]->semester }}</td>
                          </tr>
                          <tr>
                            <td>Tahun Masuk</td>
                            <td>: {{ $data['biodata'][0]->tahun_masuk }}</td>
                          </tr>
                          <tr>
                            <td>Program Studi</td>
                            <td>: {{ $data['biodata'][0]->programstudi->programstudi }}</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>: {{ $data['biodata'][0]->kelas->ruangkelas }} | {{ $data['biodata'][0]->kelas->namakelas }}</td>
                          </tr>
                          <tr>
                            <td>Dosen Wali</td>
                            <td>: {{ $data['biodata'][0]->dosen->nama }}</td>
                          </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    {{-- Modal Edit Biodata --}}
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editbiodata">
                      Edit Biodata
                    </button>
                    <div class="modal fade" id="editbiodata" tabindex="-1">
                      <div class="modal-dialog modal-lg">
                          <form action="{{route('mahasiswa.update_biodata')}}" method="post" class="f1">
                              @csrf
                              @method( 'PUT' )
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Biodata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                              <div class="modal-body">
                                    <form class="row g-3">

                                      <div class="col-md-12">
                                          <label for="namamhs" class="form-label">Nama Mahasiswa</label>
                                          <input type="text" class="form-control" id="namamhs" value="{{ Auth::user()->name }}" disabled>
                                      </div>

                                      <div class="col-md-12">
                                        <label for="inputName5" class="form-label">NIK Mahasiswa</label>
                                        <input type="text" class="form-control" id="inputName5" name="nik_mhs" value="{{ $data['biodata'][0]->nik_mhs }}">
                                      </div>

                                      <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="inputName5" name="tempat_lahir" value="{{ $data['biodata'][0]->tempat_lahir }}">
                                    </div>
                                      
                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="inputName5" name="tgl_lahir" value="{{ $data['biodata'][0]->tgl_lahir }}">
                                    </div>

                                    <div class="col-md-12">
                                      <label for="inputName5" class="form-label">Alamat</label>
                                      <input type="text" class="form-control" id="inputName5" name="alamat" value="{{ $data['biodata'][0]->alamat }}">
                                    </div>

                                    <div class="col-md-12">
                                      <label for="inputName5" class="form-label">Desa</label>
                                      <input type="text" class="form-control" id="inputName5" name="desa" value="{{ $data['biodata'][0]->desa }}">
                                    </div>
                                    
                                    <div class="col-md-12">
                                      <label for="inputName5" class="form-label">Kecamatan</label>
                                      <input type="text" class="form-control" id="inputName5" name="kec" value="{{ $data['biodata'][0]->kec }}">
                                    </div>
                                    
                                    <div class="col-md-12">
                                      <label for="inputName5" class="form-label">Kabupaten</label>
                                      <input type="text" class="form-control" id="inputName5" name="kab" value="{{ $data['biodata'][0]->kab }}">
                                    </div>

                                    <div class="col-md-12">
                                      <label for="inputName5" class="form-label">provinsi</label>
                                      <input type="text" class="form-control" id="inputName5" name="prov" value="{{ $data['biodata'][0]->prov }}">
                                    </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                  </div>
                        </div>
                      </form>
                      </div>
                  </div><!-- End Large Modal-->
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
