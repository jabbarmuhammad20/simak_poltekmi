@extends('layouts.dashboard')

@section('content')

<div class="pagetitle">
    <h1>{{ $data['title']}}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">{{ $data['title']}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form {{ $data['title']}}</h5>

              <!-- General Form Elements -->
              <form action="{{ Auth::user()->type === 'admin' ? route ('admin.store.matkul') : route('dosen.store.matkul')}}" method="post" class="f1">
                {{csrf_field() }}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="tahun_akademik">
                            <option>Silahkan Pilih Tahun Akademik</option>
                            @foreach ($data['tahunAkademik'] as $t )
                            <option value="{{$t->tahun_akademik}}">{{$t->tahun_akademik}}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="prog_studi">
                            <option>Silahkan Pilih Program Studi</option>
                            <option value="trpl">Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="trm">Teknologi Rekayasa Multimedia</option>
                            <option value="bdl">Bisnis Digital</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="k_matkul" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_matakuliah" class="form-control">
                  </div>
                </div>


                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">SKS</label>
                    <div class="col-sm-10">
                      <input type="number" name="sks" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                      <input type="number" name="semester" class="form-control">
                    </div>
                  </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dosen Pengampu</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="dosen_id">
                            <option selected>Pilih Dosen Pengampu</option>
                            @foreach ($data['dosen'] as $d )
                            <option value="{{$d->user_id}}" >{{$d->nidn}}-{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="aktif">
                            <option selected>Open this select menu</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" style="height: 100px" name="ket"></textarea>
                    </div>
                  </div>
                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
  </section>
  
@endsection
