@extends('bidang.layouts.master-auth')

@section('title')

    <title>List Barang</title>

@endsection



@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Barang
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
                                        <li class="active"><a href="#tabkiba" data-toggle="tab">KIB A</a></li>
                                        <li><a href="#tabkibb" data-toggle="tab">KIB B</a></li>
                                        <li><a href="#tabkibc" data-toggle="tab">KIB C</a></li>
                                        <li><a href="#tabkibd" data-toggle="tab">KIB D</a></li>
                                        <li><a href="#tabkibe" data-toggle="tab">KIB E</a></li>
                                        <li><a href="#tabkibf" data-toggle="tab">KIB F</a></li>
                                        <li><a href="#tabkibg" data-toggle="tab">KIB G</a></li>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content col-md-12">
                                    <div class="tab-pane fade in active" id="tabkiba">
                                        <h3>Tanah</h3>
                                        <table class="table table-hover" id="table-tanah">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Luas</th>
                                                    <th>Tahun Pengadaan</th>
                                                    <th>Lokasi</th>
                                                    <th>Hak</th>
                                                    <th>No Sertif</th>
                                                    <th>Tgl Sertif</th>
                                                    <th>Penggunaan</th>
                                                    <th>Asal Usul</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibb">
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
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibc">
                                        <h3>Gedung dan Bangunan</h3>
                                        <table class="table table-hover" id="table-bangunan">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Kondisi Bangunan</th>
                                                    <th>Bertingkat</th>
                                                    <th>Beton</th>
                                                    <th>Luas (m2)</th>
                                                    <th>Lokasi</th>
                                                    <th>No Dokumen</th>
                                                    <th>Tgl Dokumen</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibd">
                                        <h3>Jalan, Irigasi dan Jaringan</h3>
                                        <table class="table table-hover" id="table-jalirja">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Kontruksi</th>
                                                    <th>Panjang (km)</th>
                                                    <th>Lebar (m)</th>
                                                    <th>Luas (m2)</th>
                                                    <th>Lokasi</th>
                                                    <th>No Dokumen</th>
                                                    <th>Tgl Dokumen</th>
                                                    <th>Penggunaan</th>
                                                    <th>Asal Usul</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Kegiatan</th>
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
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibf">
                                        <h3>Kontruksi dalam Pengerjaan</h3>
                                        <table class="table table-hover" id="table-kontruksi">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Bangunan (P, SP, D)</th>
                                                    <th>Bertingkat</th>
                                                    <th>Beton</th>
                                                    <th>Luas (m2)</th>
                                                    <th>Lokasi</th>
                                                    <th>No Dokumen</th>
                                                    <th>Tgl Dokumen</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Status Tanah</th>
                                                    <th>Kode Tanah</th>
                                                    <th>Asal Usul Pembiayaan</th>
                                                    <th>Nilai Kontrak</th>
                                                    <th>Keterangan</th>
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibg">
                                        <h3>Barang Pakai Habis</h3>
                                        <table class="table table-hover" id="table-bph">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Reg</th>
                                                    <th>Merk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total</th>
                                                    <th>Keterangan</th>
                                                    <th>Kegiatan</th>
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
            var table_tanah = $('#table-tanah').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-tanah") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'kode_barang', name: 'kode_barang'},
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'luas', name: 'luas'},
                  {data: 'tahun_pengadaan', name: 'tahun_pengadaan'},
                  {data: 'lokasi', name: 'lokasi'},
                  {data: 'hak', name: 'hak'},
                  {data: 'no_sertifikat', name: 'no_sertifikat'},
                  {data: 'tgl_sertifikat', name: 'tgl_sertifikat'},
                  {data: 'penggunaan', name: 'penggunaan'},
                  {data: 'asalusul', name: 'asalusul'},
                  {data: 'harga', name: 'harga'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });
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
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });
            var table_bangunan = $('#table-bangunan').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-bangunan") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'kode_barang', name: 'kode_barang'},
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'kondisi_bangunan', name: 'kondisi_bangunan'},
                  {data: 'bertingkat', name: 'bertingkat'},
                  {data: 'beton', name: 'beton'},
                  {data: 'luas', name: 'luas'},
                  {data: 'lokasi', name: 'lokasi'},
                  {data: 'no_dokumen', name: 'no_dokumen'},
                  {data: 'tgl_dokumen', name: 'tgl_dokumen'},
                  {data: 'harga', name: 'harga'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });
            var table_jalirja = $('#table-jalirja').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-jalirja") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'kode_barang', name: 'kode_barang'},
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'kontruksi', name: 'kontruksi'},
                  {data: 'panjang', name: 'panjang'},
                  {data: 'lebar', name: 'lebar'},
                  {data: 'luas', name: 'luas'},
                  {data: 'lokasi', name: 'lokasi'},
                  {data: 'no_dokumen', name: 'no_dokumen'},
                  {data: 'tgl_dokumen', name: 'tgl_dokumen'},
                  {data: 'penggunaan', name: 'penggunaan'},
                  {data: 'asalusul', name: 'asalusul'},
                  {data: 'harga', name: 'harga'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
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
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });
            var table_kontruksi = $('#table-kontruksi').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-kontruksi") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'bangunan', name: 'bangunan'},
                  {data: 'bertingkat', name: 'bertingkat'},
                  {data: 'beton', name: 'beton'},
                  {data: 'luas', name: 'luas'},
                  {data: 'lokasi', name: 'lokasi'},
                  {data: 'no_dokumen', name: 'no_dokumen'},
                  {data: 'tgl_dokumen', name: 'tgl_dokumen'},
                  {data: 'tgl_mulai', name: 'tgl_mulai'},
                  {data: 'status_tanah', name: 'status_tanah'},
                  {data: 'kode_tanah', name: 'kode_tanah'},
                  {data: 'asalusul', name: 'asalusul'},
                  {data: 'nilai_kontrak', name: 'nilai_kontrak'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });
            var table_bph = $('#table-bph').DataTable({
                processing: true,
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: '{{ url("data-bph") }}'
                },
                dom: 'Bflrtip',
                buttons: [
                    { extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    { extend: 'pdf', exportOptions: {columns: ':visible'} }, 
                    { extend: 'print', exportOptions: {columns: ':visible'} },
                    { extend: 'excel', exportOptions: {columns: ':visible'} }, 
                ],
                columns: [
                  {data: 'nama_barang', name: 'nama_barang'},
                  {data: 'kode_barang', name: 'kode_barang'},
                  {data: 'no_reg', name: 'no_reg'},
                  {data: 'merk', name: 'merk'},
                  {data: 'jumlah', name: 'jumlah'},
                  {data: 'harga_satuan', name: 'harga_satuan'},
                  {data: 'total', name: 'total'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan'},
                ],
            });

        });


    </script>


@endsection