@extends('layouts.master_dosen')
@section('content')
<div class="pagetitle">
    <h1>Daftar Matakuliah yang Diampu</h1>
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
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Smt</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Progam</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matkul as $m )
                                {{-- @if($n->dosen_id == Auth::user()->id) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $m->k_matkul }}</td>
                                        <td>{{ $m->matakuliah }}</td>
                                        <td>{{ $m->semester }}</td>
                                        <td>{{ $m->sks }}</td>
                                        <td>{{ $m->prog_studi }}</td>
                                        <td>
                                            <a href="{{ route('dosen.nilai', $m->id)}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>
                                            </button></a>
                                        </td>
                            {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
@endsection
