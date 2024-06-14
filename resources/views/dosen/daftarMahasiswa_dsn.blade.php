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
                <h5 class="card-title">{{ $data['title'] }} | T.A {{$data['setting']->tahun_akademik}}</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Progam</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['nilai'] as $index => $mhs )
                            <tr>
                                
                                @if ( $mhs->tahunakademik->tahun_akademik == $data['setting']->tahun_akademik )
                                    
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $mhs->mahasiswa->npm }}</td>
                                <td>{{ $mhs->user->name }}</td>
                                <td>{{ $mhs->mahasiswa->programstudi->programstudi }}</td>
                                <td>
                                    @if($mhs->nilai === null)
                                    Tidak Ada Nilai
                                    @else
                                    {{ $mhs->nilai }}
                                    @endif
                                </td>
                                <td>
                                    @if ($mhs->kunci == '')
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#inputnilai{{$mhs->id}}"><i class="bi bi-pencil"></i>
                                </button>
                                    <div class="modal fade" id="inputnilai{{$mhs->id}}" value="{{$mhs->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Input Nilai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('dosen.input.nilai',$mhs->id)}}" method="post" class="f1">
                                                    @csrf
                                                    @method( 'PUT' )
                              
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">NPM</label>
                                                        <div class="col-sm-10">
                                                          <input type="integer" value="{{$mhs->Mahasiswa->npm}}" class="form-control" disabled>
                                                        </div>
                                                      </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                          <input type="integer" value="{{$mhs->User->name}}" class="form-control" disabled>
                                                        </div>
                                                    </div>
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
                                    </div>
                                    @else
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#kunci{{$mhs->id}}"><i class="bi bi-lock"></i>
                                </button>
                                <div class="modal fade" id="kunci{{$mhs->id}}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Nilai Sudah Terkunci</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">NPM</label>
                                                    <div class="col-sm-10">
                                                      <input type="integer" name="nilai" value="{{$mhs->Mahasiswa->npm}}" class="form-control" disabled>
                                                    </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                      <input type="integer" name="nilai" value="{{$mhs->User->name}}" class="form-control" disabled>
                                                    </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Nilai</label>
                                                    <div class="col-sm-10">
                                                      <input type="integer" name="nilai" value="{{$mhs->nilai}}" class="form-control" disabled>
                                                    </div>
                                                  </div>
                                                  <label for="inputText" class="col-sm-10 col-form-label">* Note : </label>
                                                  <label for="inputText" class="col-sm-10 col-form-label">- Jika ada perubahan nilai silahkan hubungi admin</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                </td>
                            @else

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
        
@endsection
