@extends('bidang.layouts.master-auth')

@section('title')

    <title>List Aset</title>

@endsection



@section('content')


    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

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

            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Aset
                </h1>

            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel with-nav-tabs panel-primary">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabkibb" data-toggle="tab">KIB B</a></li>
                                        <li><a href="#tabkibe" data-toggle="tab">KIB E</a></li>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content col-md-12">
                                    <div class="tab-pane fade in active" id="tabkibb">
                                        <h3>Peralatan dan Mesin</h3>
                                        <table class="table table-hover" id="table-mesin">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Merk</th>
                                                    <th>Ukuran (CC)</th>
                                                    <th>Bahan</th>
                                                    <th>Tahun Pembelian</th>
                                                    <th>No Pabrik</th>
                                                    <th>No Mesin</th>
                                                    <th>No Rangka</th>
                                                    <th>No Polisi</th>
                                                    <th>No BPKB</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Lokasi</th>
                                                    <th>Kegiatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibe">
                                        <h3>Aset Tetap Lainnya</h3>
                                        <table class="table table-hover" id="table-aset">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Judul</th>
                                                    <th>Spesifikasi</th>
                                                    <th>Asal</th>
                                                    <th>Pencipta</th>
                                                    <th>Bahan</th>
                                                    <th>Jenis</th>
                                                    <th>Ukuran</th>
                                                    <th>Jumlah</th>
                                                    <th>Tahun Cetak</th>
                                                    <th>Asal Usul</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Lokasi</th>
                                                    <th>Kegiatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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
            var table_mesin = $('#table-mesin').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-mesin") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columnDefs: [

                    { targets: [5, 6, 7, 8, 9, 10, 11, 14], visible: false }

                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'}, 
                  {data: 'kode_barang', name: 'kode_barang'}, 
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'merk', name: 'merk'},
                  {data: 'ukuran', name: 'ukuran'},
                  {data: 'bahan', name: 'bahan'},
                  {data: 'tahun_pembelian', name: 'tahun_pembelian'},
                  {data: 'no_pabrik', name: 'no_pabrik'},
                  {data: 'no_mesin', name: 'no_mesin'},
                  {data: 'no_rangka', name: 'no_rangka'},
                  {data: 'no_polisi', name: 'no_polisi'},
                  {data: 'no_bpkb', name: 'no_bpkb'},
                  {data: 'jumlah', name: 'jumlah'},
                  {data: 'harga_satuan', name: 'harga_satuan'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kir.lokasi', name: 'kir.lokasi'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                  {data: 'action', name: 'action'},
                ],
            });
            var table_aset = $('#table-aset').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-aset") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columnDefs: [

                    { targets: [4, 5, 6, 7, 8, 9, 11, 14], visible: false }

                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'kode_barang', name: 'kode_barang'},
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'judul', name: 'judul'},
                  {data: 'spesifikasi', name: 'spesifikasi'},
                  {data: 'asal_daerah', name: 'asal_daerah'},
                  {data: 'pencipta', name: 'pencipta'},
                  {data: 'bahan', name: 'bahan'},
                  {data: 'jenis', name: 'jenis'},
                  {data: 'ukuran', name: 'ukuran'},
                  {data: 'jumlah', name: 'jumlah'},
                  {data: 'tahun_cetak', name: 'tahun_cetak'},
                  {data: 'asalusul', name: 'asalusul'},
                  {data: 'harga_satuan', name: 'harga_satuan'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kir.lokasi', name: 'kir.lokasi'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                  {data: 'action', name: 'action'},
                ],
            });

        });


    </script>


@endsection