@extends('bidang.layouts.master-auth')

@section('title')
    <title>Data Kegiatan: {{$kegiatan->nama_kegiatan}}</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif

        @if(Session::has('flash_message'))
          <div class="alert alert-success">
            {{ Session::get('flash_message') }}
          </div>
        @endif

        <section class="content-header">
            <h1>
                Data Kegiatan: {{$kegiatan->nama_kegiatan}}
            </h1>
        </section>
        <!-- end content-header section -->

        <!-- content -->
        <section class="content">
            <div class="box box-primary col-md-6">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table table-condensed">
                            <tr>
                                <td class="col-sm-4">Kode Kegiatan</td>
                                <th class="text-left">{{$kegiatan->kode}}</td>
                            </tr>
                            <tr>
                                <td>Nama Kegiatan</td>
                                <th class="text-left">{{$kegiatan->nama_kegiatan}}</td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <th class="text-left">{{$kegiatan->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dibuat</td>
                                <th class="text-left">{{$kegiatan->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Pengadaan Barang</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table" id="table-pengadaan">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th>Kategori</th>
                                    <th>Nomor BAST</th>
                                    <th>Keterangan</th>
                                    <th>Status Unit</th>
                                    <th>Status Induk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content section -->
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
                    url: '{{ url("bidang/data-pengadaan/".$kegiatan->kode) }}'
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
                    {data: 'kategori.nama_kategori', name: 'kategori.nama_kategori'},
                    {data: 'bast', name: 'bast'},
                    {data: 'keterangan', name: 'keterangan'},
                    { 
                        data: 'status_unit', 
                        name: 'status_unit', 
                        render: function ( data, type, row, meta ) {
                            if (data == 0) {
                                return '<font color="orange">Unconfirmed</font>';
                            } else if (data == 1) {
                                return '<font color="green">Approved</font>';
                            } else if (data == 2) {
                                return '<font color="red">Declined</font>';
                            } else if (data == 3) {
                                return '<font color="black">Inputted</font>';
                            }
                        }
                    },
                    {
                        data: 'status_bidang', 
                        name: 'status_bidang',
                        render: function ( data, type, row, meta ) {
                            if (data == 0) {
                                return '<font color="orange">Unconfirmed</font>';
                            } else if (data == 1) {
                                return '<font color="green">Approved</font>';
                            } else if (data == 2) {
                                return '<font color="red">Declined</font>';
                            } else if (data == 3) {
                                return '<font color="black">Inputted</font>';
                            }
                        }
                    },
                    { data:'action', name:'action'},
                ],
            });
        });
    </script>


@endsection