<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard | {{ $data['title'] }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/boxicons/css/boxicons.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/quill/quill.bubble.css') }}"
        rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/remixicon/remixicon.css') }}"
        rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/simple-datatables/style.css') }}"
        rel="stylesheet">

    <link href="{{ asset('niceadmin/assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

            <div class="card">
                <img src="{{ asset('img/kop.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">
                        <font color="black">
                            <center>{{ $data['title'] }} <br>
                                TAHUN AKADEMIK {{ $setting->tahun_akademik }}
                                
                        </font>
                        </center>
                    </h5>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ Auth::user()->name }}</td>
                                <td></td>
                                <td>NPM</td>
                                <td>: {{ Auth::user()->mahasiswa[0]->npm }}</td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td>: {{ Auth::user()->mahasiswa[0]->programstudi->programstudi }}</td>
                                <td></td>
                                <td>Semester</td>
                                <td>: {{ Auth::user()->mahasiswa[0]->semester }} (@if ($setting->ganjil_genap == 1) Ganjil @else Genap @endif)</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Matakuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <blade>
                                @foreach ($data['matkul'] as $index => $mt )
                                {{-- @if ($mt->tahunakademik[0]->tahun_akademik == $setting->tahun_akademik) --}}
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $mt->k_matkul }}</td>
                                    <td>{{ $mt->nama_matakuliah }}</td>
                                    <td>{{ $mt->sks }}</td>
                                    <td>{{ $mt->semester }}</td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Dosen Wali</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Mahasiswa</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Jabbar</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        window.addEventListener("load", window.print());

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const BASEURL = 'http://127.0.0.1:8000/';

    </script>

    <script src="{{ asset('niceadmin/assets/vendor/apexcharts/apexcharts.min.js') }}">
    </script>
    <script
        src="{{ asset('niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('niceadmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script
        src="{{ asset('niceadmin/assets/vendor/simple-datatables/simple-datatables.js') }}">
    </script>
    <script src="{{ asset('niceadmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('niceadmin/assets/js/main.js') }}"></script>
</body>

</html>
