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
                            <td>{{ $m->k_matkul }}</td>
                            <td>{{ $m->nama_matakuliah }}</td>
                            <td>{{ $m->semester }}</td>
                            <td>{{ $m->sks }}</td>
                            <td>{{ $m->prog_studi }}</td>
                            <td>
                                <a href="{{ route('dosen.matkul.nilai', $m->id)}}" class="btn btn-primary btn-sm">
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
