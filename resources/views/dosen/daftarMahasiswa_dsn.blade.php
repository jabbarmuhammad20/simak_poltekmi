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
                <h5 class="card-title">{{ $data['title'] }}</h5>

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
                        @foreach($data['nilai'] as $index => $mhs )
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $mhs->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $mhs->user->name }}</td>
                                <td>{{ $mhs->mahasiswa->semester }}</td>
                                <td>{{ $mhs->matakuliah->sks }}</td>
                                <td>{{ $mhs->matakuliah->prog_studi }}</td>
                                <td>
                                    @if ($mhs->nilai === null)
                                        Tidak Ada Nilai
                                    @else 
                                        {{ $mhs->nilai }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
</section>

@endsection
