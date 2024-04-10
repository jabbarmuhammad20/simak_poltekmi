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

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Program Studi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach($data['dosen'] as $index => $dosen )
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $dosen->nidn }}</td>
                                <td>{{ $dosen->user->name }}</td>
                                <td>{{ $dosen->prog_studi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
</section>

@endsection
