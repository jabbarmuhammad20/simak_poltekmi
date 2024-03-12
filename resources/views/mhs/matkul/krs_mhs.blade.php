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
</div>

<section class="section">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kartu Rencana Studi</h5>

                <table id="matkulTable"  class="table table-striped">
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
                    </tbody>
                </table>

            </div>
        </div>
    </section>
    @endsection
    
    
    @section('script')
    

    <script>
        
        function addMatkul(matakuliahId) {
        $.ajax({
            url: '/inputkrs',
            type: 'post',
            dataType: 'json',
            data: {
                matakuliah_id: matakuliahId,
                _token: '{{ csrf_token() }}' 
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message); 
                    fetchData();
                } else {
                    alert('Failed to add course.'); 
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    }
    
    function checkMatkul(courseId) {
        $.ajax({
            url: '/inputkrs',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var existKRS = response.message;
                    var isCourseExists = existKRS.some(function(data) {
                        return data.matakuliah_id === courseId;
                    });
                    if (isCourseExists) {
                        $('button[data-course-id="' + courseId + '"]').prop('disabled', true);
                        $('button[data-course-id="' + courseId + '"]').text('Sudah Ditambahkan');
                    } else {
                        $('button[data-course-id="' + courseId + '"]').prop('disabled', false);
                        $('button[data-course-id="' + courseId + '"]').text('Tambahkan');
                    }
                } else {
                    alert('Failed to fetch available courses.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    
    function fetchData() {
        $.ajax({
            url: '/krs',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    updateTable(response.message);
                } else {
                    alert('Failed to fetch courses.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    

    function updateTable(data) {
        if (data && Array.isArray(data)) {
            var tableBody = $('#matkulTable tbody');
            tableBody.empty();
            for (var i = 0; i < data.length; i++) {
                var mt = data[i];
                var row = '<tr>' +
                    '<th scope="row">' + (i + 1) + '</th>' +
                    '<td>' + mt.k_matkul + '</td>' +
                    '<td>' + mt.nama_matakuliah + '</td>' +
                    '<td>' + mt.sks + '</td>' +
                    '<td>' + mt.semester + '</td>' +
                    '<td>' +
                        '<button data-course-id="' + mt.id + '" onclick="addMatkul(' + mt.id + ')" type="button" class="addButton btn btn-primary">Tambahkan</i></button>' +
                        '</td>' +
                        '</tr>';
                        tableBody.append(row);
                        checkMatkul(mt.id); 
                    }
                } else {
                    console.error("Invalid or empty data received:", data);
                }
            }
            
            
            $(document).ready(function() {
                fetchData();
            });
            
            
            </script>

@endsection()
