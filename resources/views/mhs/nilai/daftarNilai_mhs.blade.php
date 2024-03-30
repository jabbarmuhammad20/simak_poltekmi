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
              <h5 class="card-title">Semester 1</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '1')
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

                                @endif
                            </td>
                        </tr>  
                        @endif           
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>

<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 2</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '2')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>

<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 3</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '3')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>

<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 4</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '4')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>

<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 5</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '5')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>

<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 6</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '6')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 7</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '7')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
<section class="section">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Semester 8</h5>
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
                        @foreach($data['matkul'] as $n )
                        @if ($n->Matakuliah->semester == '8')
                            
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
                                
                                @endif
                            </td>
                        </tr>             
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
@endsection
