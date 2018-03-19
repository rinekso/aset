@extends('subunit.layouts.master-auth')

@section('title')
    <title>List Pengadaan</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">
            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Pengadaan DataTables<strong>{{Auth::user()->name}}</strong>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">List Pengadaan</li>
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
                                <table class="table" id="table-pengadaan">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                            <th>Kategori</th>
                                            <th>Nomor BST</th>
                                            <th>Keterangan</th>
                                            <th>Status Unit</th>
                                            <th>Status Bidang</th>
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
        var table = $('#table-pengadaan').DataTable({
            processing: true,
            serverSide: true,
            processing: true,
            responsive: true,
            ajax: {
                url: '{{ url("subunit/data-pengadaan") }}'
            },
            dom: 'Bflrtip',
            buttons: [
                { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                { extend: 'print', exportOptions: {columns: ':visible'} },
                { extend: 'excel', exportOptions: {columns: ':visible'} }, 
            ],
            columns: [
              {data: 'nama', name: 'nama'},
              {data: 'jumlah', name: 'jumlah'},
              {data: 'harga_satuan', name: 'harga_satuan'},
              {data: 'total', name: 'total'},
              {data: 'kategori_id', name: 'kategori_id'},
              {data: 'no_bst', name: 'no_bst'},
              {data: 'keterangan', name: 'keterangan'},
              {data: 'status_unit', name: 'status_unit'},
              {data: 'status_bidang', name: 'status_bidang'},
            ],
        });
    });
    </script>


@endsection