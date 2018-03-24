@extends('bidang.layouts.master-auth')

@section('title')
    <title>Manajemen User</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- content-header has breadcrumbs -->
        <section class="content-header">

            <h1>
                Manajemen User
            </h1>
        </section>
        <!-- end content-header section -->
        
        <!-- content -->
        <section class="content">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-primary">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabsubunit" data-toggle="tab">Subunit</a></li>
                                        <li><a href="#tabunit" data-toggle="tab">Unit</a></li>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content col-md-12">
                                    <div class="tab-pane fade in active" id="tabsubunit">
                                        <h3>Subunit</h3>
                                        <table class="table table-hover" id="table-subunit">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Subunit</th>
                                                    <th>Unit</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade col-md-12" id="tabunit">
                                        <h3>Peralatan dan Mesin</h3>
                                        <table class="table table-hover" id="table-unit">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Unit</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </section>
        <!-- end content section -->
    </div>
    <!-- end content-wrapper -->

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function() {
            var table_subunit = $('#table-subunit').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("bidang/data-user-subunit") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nip', name: 'nip'},
                  {data: 'name', name: 'name'},
                  {data: 'profile.subunit.nama_subunit', name: 'profile.subunit.nama_subunit'},
                  {data: 'profile.unit.nama_unit', name: 'profile.unit.nama_unit'},
                  { 
                    data: 'status', 
                    name: 'status', 
                    render: function ( data, type, row, meta ) {
                        if (data == 1) {
                            return '<font color="green">Aktif</font>';
                        } else if (data == 2) {
                            return '<font color="red">Nonaktif</font>';
                        }
                    }
                  },
                  {data: 'action', name: 'action'},
                ],
            });
            var table_unit = $('#table-unit').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("bidang/data-user-unit") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nip', name: 'nip'},
                  {data: 'name', name: 'name'},
                  {data: 'profile.unit.nama_unit', name: 'profile.unit.nama_unit'},
                  { 
                    data: 'status', 
                    name: 'status', 
                    render: function ( data, type, row, meta ) {
                        if (data == 1) {
                            return '<font color="green">Aktif</font>';
                        } else if (data == 2) {
                            return '<font color="red">Nonaktif</font>';
                        }
                    }
                  },
                  {data: 'action', name: 'action'},
                ],
            });
        });
    </script>

@endsection