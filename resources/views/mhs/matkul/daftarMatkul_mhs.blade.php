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
  </div><!-- End Page Title -->

  <section class="section">
    <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $data['title'] }} | T.A {{$setting->tahun_akademik}} | @if ($setting->ganjil_genap == 1) Ganjil @else Genap @endif</h5>

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
                @foreach ($data['matkul'] as $index => $mt )
              @if ( $mt->semester == Auth::user()->Mahasiswa[0]->semester)
              @elseif ($mt->tahun_akademik_id == $setting->id)
              <tr>
                <th scope="row">{{ $index + 1}}</th>
                <td>{{$mt->k_matkul}}</td>
                <td>{{$mt->nama_matakuliah}}</td>
                <td>{{$mt->sks}}</td>
                <td>{{$mt->semester}}</td>
              </tr>
              @endif
              @endforeach
              </tbody>
            </table>

          </div>
        </div>
  </section>
@endsection