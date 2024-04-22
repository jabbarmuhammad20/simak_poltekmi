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
                    <h5 class="card-title">Datatables <div class="col-lg-6">
                    </h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    Import</button>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Semester</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['mahasiswa'] as $index => $m )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $m->user->name }}</td>
                                <td>{{ $m->npm }}</td>
                                <td>{{ $m->semester }}</td>
                                <td>{{ $m->programstudi->programstudi }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="bi bi-search"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal Update Semester --}}
<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Semester</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.update.Import')}}" method="post" enctype="multipart/form-data">
          @csrf
          @method( 'PUT' )
       
        <div class="modal-body">
          <a href="{{route('admin.update.export')}}">Download Data</a>
         <div class="row mb-3">
            <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
            <div class="col-sm-9">
              <input class="form-control" type="file" name="file" id="formFile">
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
@endsection
