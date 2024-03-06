@extends('layouts.master_mhs')
@section('content')
<div class="pagetitle">
    <h1>Daftar Matakuliah Aktif</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Daftar Matakuliah Aktif</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Daftar Matakuliah Aktif</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Matakuliah</th>
                  <th scope="col">SKS</th>
                  <th scope="col">Semester</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($matkul as $mt )
                  
                <tr>
                  <th scope="row">1</th>
                  <td>{{$mt->k_matkul}}</td>
                  <td>{{$mt->nama_matakuliah}}</td>
                  <td>{{$mt->sks}}</td>
                  <td>{{$mt->semester}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
  </section>
@endsection