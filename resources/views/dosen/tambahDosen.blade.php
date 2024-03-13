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
    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form {{ $data['title'] }}</h5>

              <form action="{{route ('admin.store.dosen')}}" method="post" class="f1">
                @csrf
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-10">
                          <input type="number" name="nidn" id="nidn" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example" name="prog_studi" id="prog_studi">
                            <option>Silahkan Pilih Program Studi</option>
                            <option value="trpl">Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="trm">Teknologi Rekayasa Multimedia</option>
                            <option value="bdl">Bisnis Digital</option>
                          </select>
                        </div>
                      </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
              </form>

            </div>
          </div>

        </div>
  </section>
  
@endsection