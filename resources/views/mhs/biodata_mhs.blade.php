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
                            <td>No Pokok Mahasiswa</td>
                            <td>: {{ $data['biodata'][0]->npm }}</td>
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
                            <td>Jurusan</td>
                            <td>: {{ $data['biodata'][0]->programstudi->programstudi }}</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>: {{ $data['biodata'][0]->kelas->namakelas }}</td>
                          </tr>
                          <tr>
                            <td>Dosen Wali</td>
                            <td>: {{ $data['biodata'][0]->dosen->nama }}</td>
                          </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <button type="button" class="btn btn-warning btn-sm" >Edit Biodata <i class="bi bi-pencil"></i>
                </button>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
