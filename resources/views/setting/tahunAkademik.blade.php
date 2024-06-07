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
              <h5 class="card-title">Edit {{ $data['title'] }}</h5>

              <!-- General Form Elements -->
              <form action="{{route('admin.pengaturan.updatetahunakademik',$data['setting'][0]->id)}}" method="put" class="f1">
                {{csrf_field() }}
                @method( 'PUT' )
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="tahunakademik_id">
                          
                        @foreach ( $data['tahunakademik'] as $t )

                          @if ($t->id == $data['setting'][0]->tahunakademik_id)
                          
                          <option selected disabled>{{$t->tahun_akademik}}</option>
                        @else
                        <option value="{{$t->id}}">{{$t->tahun_akademik}}</option>
                        @endif
                        @endforeach
                      </select>
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
