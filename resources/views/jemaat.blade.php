@extends('layouts/master')
@section('title', 'Data Jemaat')
@section('content')


<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
</head>

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
<!-- /.card-header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">

        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="jemaat/create" class="btn btn-primary btn-md" role="button" aria-disabled="true">
                    <i class="fas fa-plus mr-2"></i>Tambah Data
                </a>
            </div>
            <div class="ml-auto mr-3">
                
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Lingkungan
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            
                        @foreach($lingkungan as $key=>$l)
                            <a class="dropdown-item" href="/admin/jemaatByLingkungan/{{ $l-> id }}">{{ $l->nama_lingkungan }}</a>
                        @endforeach

                        <!-- <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </div>

                <!-- <select name="lingkungan_id" id="lingkungan_id" class="form-control">
                        @if(isset($data->lingkungan_id))
                        <option selected value="{{ $data->lingkungan_id }}" disabled="disabled">{{ $data->Lingkungan()->first()->nama_lingkungan }}</option>
                        @else
                        <option selected value="null" disabled="disabled">Data lingkungan terhapus</option>
                        @endif
                    
                    @foreach($lingkungan as $key=>$l)
                        <option value="{{ $l-> id }}">{{ $l->nama_lingkungan }}</option>
                    <option value="{{ route("store_renungan") }}">{{ $l->nama_lingkungan }}</option>
                    @endforeach
                </select> -->
            </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kepala Keluarga</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Lingkungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $item-> head_of_family }}</td>
                        <td><a href="/admin/jemaat/{{ $item->id }}/view">{{ $item-> name }}</a></td>
                        <td>{{ $item-> date_of_birth }}</td>
                        @if(isset($item-> lingkungan()->first()->nama_lingkungan))
                            <td>{{ $item-> lingkungan()->first()->nama_lingkungan }}</td>
                        @else
                            <td class="text-danger">Data lingkungan terhapus</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card-body -->


<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<script
    src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>
<script
    src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script
    src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('admin-lte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}">
</script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
</script>
<!-- Page specific script -->
<script>
    jQuery(document).ready(function ($) {
        /* now you can use $ */
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection
