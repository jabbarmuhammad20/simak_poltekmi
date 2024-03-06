@extends('layouts.master_mhs')
@section('content')
<div class="pagetitle">
    <h1>Daftar Nilai</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Daftar Nilai</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nilai Semester 1</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Matakuliah</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matkul as $n )
                            @if($n->Matakuliah->semester == '1')
                                @if($n->krs == '1')
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $n->Matakuliah->k_matkul }}</td>
                                        <td>{{ $n->Matakuliah->nama_matakuliah }}</td>
                                        <td>{{ $n->Matakuliah->sks }}</td>
                                        <td>{{ $n->nilai }}</td>
                                        <td>
                                            @if($n->nilai >= '80')
                                                A
                                            @elseif($n->nilai >= '70')
                                                B
                                            @elseif($n->nilai >= '60')
                                                C
                                            @elseif($n->nilai >= '50')
                                                D
                                            @elseif($n->nilai >= '1')
                                                E
                                            @else
                                                {{-- Nilai tidak ditampilkan --}}
                                            @endif
                                        </td>
                                    @else
                                        {{-- Matakuliah tidak ditampilkan --}}
                                @endif
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
@endsection
