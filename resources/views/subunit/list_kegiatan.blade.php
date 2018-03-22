@extends('subunit.layouts.master-auth')

@section('title')
    <title>List Kegiatan</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">
            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Kegiatan <strong>{{Auth::user()->name}}</strong>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">List Kegiatan</li>
                </ol>

            </section>
            <!-- end content-header section -->
            <!-- content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                            </div>
                            <div class="box-body table-responsive">
                                <table class="table" id="table-kegiatan">
                                    <thead>
                                        <tr>
                                            <th>Kode Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end content section -->
        </div>
        <!-- end container -->
    </div>
    <!-- end content-wrapper -->
@endsection


@section('scripts')

    <script>
      $(function() {
        var table = $('#table-kegiatan').DataTable({
            processing: true,
            serverSide: true,
            processing: true,
            responsive: true,
            ajax: {
                url: '{{ url("subunit/data-kegiatan") }}'
            },
            dom: 'Bflrtip',
            buttons: [
                { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                { extend: 'print', exportOptions: {columns: ':visible'} },
                { extend: 'excel', exportOptions: {columns: ':visible'} }, 
            ],
            columns: [
              {data: 'kode', name: 'kode'},
              {data: 'nama_kegiatan', name: 'nama_kegiatan'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action'},
            ],
        });
    });
    </script>


@endsection