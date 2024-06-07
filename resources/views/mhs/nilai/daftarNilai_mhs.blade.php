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
        @foreach ([1, 2, 3, 4, 5, 6, 7, 8] as $semester)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Semester {{ $semester }}</h5>
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
                                @foreach ($data['matkul'] as $n)
                                    @if ($n->Matakuliah->semester == $semester)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $n->Matakuliah->k_matkul }}</td>
                                            <td>{{ $n->Matakuliah->nama_matakuliah }}</td>
                                            <td>{{ $n->Matakuliah->sks }}</td>
                                            <td>{{ $n->nilai }}</td>
                                            <td>
                                                @if ($n->nilai >= 80)
                                                    A
                                                @elseif($n->nilai >= 70)
                                                    B
                                                @elseif($n->nilai >= 60)
                                                    C
                                                @elseif($n->nilai >= 50)
                                                    D
                                                @elseif($n->nilai >= 1)
                                                    E
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end">Jumlah SKS</td>
                                    <td>{{ $data['semesterData'][$semester]['totalSks'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end">Indeks Prestasi</td>
                                    <td>{{ number_format($data['semesterData'][$semester]['ip'], 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="section">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Indeks Prestasi Kumulatif</h5>
                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">Total SKS</td>
                                <td>{{ $data['totalSksKumulatif'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">Indeks Prestasi Kumulatif</td>
                                <td>{{ number_format($data['ipk'], 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
