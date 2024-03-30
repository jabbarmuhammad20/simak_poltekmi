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
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Smt</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Progam</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['nilai'] as $index => $mhs )
                            <tr>
                                {{-- @if ($mhs->kunci == '') --}}
                                    
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $mhs->mahasiswa->tahun_masuk }}</td>
                                <td>{{ $mhs->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $mhs->user->name }}</td>
                                <td>{{ $mhs->mahasiswa->semester }}</td>
                                <td>{{ $mhs->matakuliah->sks }}</td>
                                <td>{{ $mhs->matakuliah->prog_studi }}</td>
                                <td>
                                    @if($mhs->nilai === null)
                                    Tidak Ada Nilai
                                    @else
                                    {{ $mhs->nilai }}
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#inputnilai"><i class="bi bi-pencil"></i>
                                </button>
                            </td>
                            {{-- @else

                            @endif --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="card-body">
            <div class="modal fade" id="inputnilai" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Masukan Nilai : {{$mhs->Mahasiswa->npm}}-{{$mhs->User->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('dosen.input.nilai',$mhs->id)}}" method="post" class="f1">
                            @csrf
                            @method( 'PUT' )
      
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col-sm-10">
                                  <input type="integer" name="nilai" value="{{$mhs->nilai}}" class="form-control">
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Vertically centered Modal-->
</section>
@endsection
