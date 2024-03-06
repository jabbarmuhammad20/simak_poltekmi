@extends('layouts.master_mhs')
@section('content')
<div class="pagetitle">
    <h1>Kartu Rencana Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Kartu Rencana Studi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kartu Rencana Studi</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matkul as $mt )

                            <tr>
                                <form action="{{ route ('inputkrs') }}" method="post">
                                    <th scope="row">1</th>
                                    <td>{{ $mt->k_matkul }}</td>
                                    <td>{{ $mt->nama_matakuliah }}</td>
                                    <td>{{ $mt->sks }}</td>
                                    <td>{{ $mt->semester }}</td>
                                    <td>
                                        @csrf
                                        <input type="hidden" name="matakuliah_id" value="{{ $mt->id }}">
                                        <input type="hidden" name="mahasiswa_npm" value="{{ Auth::user()->npm }}">
                                        @dd($mt->Nilai);
                                        @if(isset ($mt->Nilai->matakuliah_id))
                                            Sudah Diambil
                                        @else
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bi bi-check-circle">Tambahkan</i></button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
</section>
@endsection
