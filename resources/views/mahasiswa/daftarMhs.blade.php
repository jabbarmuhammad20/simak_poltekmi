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
                    <h5 class="card-title">Datatables</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Semester</th>
                                <th>Program Studi</th>
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
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
