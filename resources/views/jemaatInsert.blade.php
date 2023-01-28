@extends('layouts/master')
@section('title', 'Tambah Data Jemaat')
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

    <!-- CSS Bootstrap Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
</head>

<!-- /.card-header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/admin/jemaat/store" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="no_kk" class="col-md-2 col-form-label text-md-right">No KK</label>

                <div class="col-md-6">
                    <input id="no_kk" type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
                        value="" autofocus>

                    @error('no_kk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nik" class="col-md-2 col-form-label text-md-right">NIK</label>

                <div class="col-md-6">
                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        value="" autofocus>

                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="lingkungan_id" class="col-md-2 col-form-label text-md-right">Lingkungan</label>

                <div class="col-md-6">
                    <select name="lingkungan_id" id="lingkungan_id" class="form-control">
                        <option value="" selected="selected">Pilih Lingkungan Jemaat</option>
                        
                        @foreach($lingkungan as $key=>$l)
                            <option value="{{ $l-> id }}">{{ $l->nama_lingkungan }}</option>
                        @endforeach
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="head_of_family" class="col-md-2 col-form-label text-md-right">Kepala kel.</label>

                <div class="col-md-6">
                    <input id="head_of_family" type="text"
                        class="form-control @error('head_of_family') is-invalid @enderror" name="head_of_family"
                        value="" autofocus>

                    @error('head_of_family')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthplace" class="col-md-2 col-form-label text-md-right">Tpt lahir</label>

                <div class="col-md-6">
                    <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror"
                        name="birthplace" value="" autofocus>

                    @error('birthplace')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="date_of_birth" class="col-md-2 col-form-label text-md-right">Tgl Lahir</label>

                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                        <input id="date_of_birth" type="text"
                            class="datepicker form-control @error('date_of_birth') is-invalid @enderror"
                            name="date_of_birth" value="" autofocus autocomplete="off" autocorrect="off"
                            autocapitalize="off" spellcheck="false">
                    </div>
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2 text-right">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </form>
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
<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    jQuery(document).ready(function ($) {
        /* now you can use $ */
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

</script>
@endsection
