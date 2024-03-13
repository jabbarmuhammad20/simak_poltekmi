@extends('layouts.dashboard')

@section('content')

<div class="pagetitle">
    <h1>Tambah Matakuliah</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tambah Matakuliah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Matakuliah</th>
                                <th>Program Keahlian</th>
                                <th>SKS</th>
                                <th>Dosen Pengampu</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['matkul'] as $m )
                            
                          <tr>
                            <td>1</td>
                            <td>{{$m->k_matkul}}</td>
                            <td>{{$m->nama_matakuliah}}</td>
                            <td>{{$m->prog_studi}}</td>
                            <td>{{$m->sks}}</td>
                            <td>{{$m->user[0]->name}}</td>
                          </tr>
                          
                          @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
