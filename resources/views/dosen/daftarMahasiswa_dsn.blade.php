@extends('layouts.master_dosen')
@section('content')
<div class="pagetitle">
    <h1>Daftar Mahasiswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Daftar Matakuliah yang Diampu</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Matakuliah</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Smt</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Progam</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $mhs )
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $mhs->npm }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
@endsection
