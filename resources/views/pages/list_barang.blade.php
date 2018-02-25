@extends('layouts.master-auth')

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
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tabkiba">
                                        <h3>Tanah</h3>
                                        <table class="table table-hover">
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
                                            </tr>

                                        @foreach($tanah as $key => $data)
                                            <tr>
                                                <td>{{$data->nama_barang}}</td>
                                                <td>{{$data->kode_barang}}</td>
                                                <td>{{$data->no_reg}}</td>
                                                <td>{{$data->luas}}</td>
                                                <td>{{$data->tahun_pengadaan}}</td>
                                                <td>{{$data->lokasi}}</td>
                                                <td>{{$data->hak}}</td>
                                                <td>{{$data->no_sertifikat}}</td>
                                                <td>{{$data->tgl_sertifikat}}</td>
                                                <td>{{$data->penggunaan}}</td>
                                                <td>{{$data->asalusul}}</td>
                                                <td>{{$data->harga}}</td>
                                                <td>{{$data->keterangan}}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibb">
                                        <h3>Peralatan dan Mesin</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>Merk</th>

                                                <th>Spesifikasi</th>
                                                
                                                <th>No Seri</th>

                                                <th>Stok</th>

                                                <th>Keterangan</th>

                                                <th>Jenis Barang</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($mesin as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibc">
                                        <h3>Gedung dan Bangunan</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>Merk</th>

                                                <th>Tipe</th>
                                                
                                                <th>Ukuran</th>

                                                <th>No Pabrik</th>

                                                <th>No Rangka</th>

                                                <th>No Mesin</th>

                                                <th>Jumlah</th>                                                

                                                <th>Keterangan</th>

                                                <th>Lokasi</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($bangunan as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibd">
                                        <h3>Jalan, Irigasi dan Jaringan</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>Merk</th>

                                                <th>Tipe</th>
                                                
                                                <th>Ukuran</th>

                                                <th>Jumlah</th>                                                

                                                <th>Keterangan</th>

                                                <th>Lokasi</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($jalirja as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibe">
                                        <h3>Aset Tetap Lainnya</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>No Sertifikat</th>

                                                <th>Tipe</th>
                                                
                                                <th>Ukuran</th>

                                                <th>Satuan</th>                                             

                                                <th>Lokasi</th>

                                                <th>Keterangan</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($aset as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibf">
                                        <h3>Kontruksi dalam Pengerjaan</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>No Sertifikat</th>

                                                <th>Tipe</th>
                                                
                                                <th>Ukuran</th>

                                                <th>Satuan</th>                                             

                                                <th>Lokasi</th>

                                                <th>Keterangan</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($kontruksi as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibg">
                                        <h3>Barang Pakai Habis</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Kode Barang</th>

                                                <th>Nama Barang</th>

                                                <th>No Sertifikat</th>

                                                <th>Tipe</th>
                                                
                                                <th>Ukuran</th>

                                                <th>Satuan</th>                                             

                                                <th>Lokasi</th>

                                                <th>Keterangan</th>

                                                <th>Terakhir Dirubah</th>

                                            </tr>

                                        @foreach($bph as $key => $data)
                                            <tr>
                                            </tr>
                                        @endforeach
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
        
    </script>


@endsection