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
                                            </tr>

                                        @foreach($mesin as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->kode_barang }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->merk }}</td>
                                                <td>{{ $data->ukuran }}</td>
                                                <td>{{ $data->bahan }}</td>
                                                <td>{{ $data->tahun_pembelian }}</td>
                                                <td>{{ $data->no_pabrik }}</td>
                                                <td>{{ $data->no_mesin }}</td>
                                                <td>{{ $data->no_rangka }}</td>
                                                <td>{{ $data->no_polisi }}</td>
                                                <td>{{ $data->no_bpkb }}</td>
                                                <td>{{ $data->jumlah }}</td>
                                                <td>{{ $data->harga_satuan }}</td>
                                                <td>{{ $data->keteran }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibc">
                                        <h3>Gedung dan Bangunan</h3>
                                        <table class="table table-hover">
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
                                            </tr>

                                        @foreach($bangunan as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->kode_barang }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->kondisi_bangunan }}</td>
                                                <td>{{ $data->bertingkat }}</td>
                                                <td>{{ $data->beton }}</td>
                                                <td>{{ $data->luas }}</td>
                                                <td>{{ $data->lokasi }}</td>
                                                <td>{{ $data->no_dokumen }}</td>
                                                <td>{{ $data->tgl_dokumen }}</td>
                                                <td>{{ $data->harga }}</td>
                                                <td>{{ $data->keterangan }}</td>                                               


                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibd">
                                        <h3>Jalan, Irigasi dan Jaringan</h3>
                                        <table class="table table-hover">
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
                                            </tr>

                                        @foreach($jalirja as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->kode_barang }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->kontruksi }}</td>
                                                <td>{{ $data->panjang }}</td>
                                                <td>{{ $data->lebar }}</td>
                                                <td>{{ $data->luas }}</td>
                                                <td>{{ $data->lokasi}}</td>
                                                <td>{{ $data->no_dokumen }}</td>
                                                <td>{{ $data->tgl_dokumen }}</td>
                                                <td>{{ $data->penggunaan }}</td>
                                                <td>{{ $data->asalusul }}</td>
                                                <td>{{ $data->harga }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibe">
                                        <h3>Aset Tetap Lainnya</h3>
                                        <table class="table table-hover">
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
                                            </tr>

                                        @foreach($aset as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->kode_barang }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->spesifikasi }}</td>
                                                <td>{{ $data->asal_daerah }}</td>
                                                <td>{{ $data->pencipta }}</td>
                                                <td>{{ $data->bahan}}</td>
                                                <td>{{ $data->jenis }}</td>
                                                <td>{{ $data->ukuran }}</td>
                                                <td>{{ $data->jumlah }}</td>
                                                <td>{{ $data->tahun_cetak }}</td>
                                                <td>{{ $data->asalusul }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibf">
                                        <h3>Kontruksi dalam Pengerjaan</h3>
                                        <table class="table table-hover">
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
                                            </tr>

                                        @foreach($kontruksi as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->bangunan }}</td>
                                                <td>{{ $data->bertingkat }}</td>
                                                <td>{{ $data->beton }}</td>
                                                <td>{{ $data->luas }}</td>
                                                <td>{{ $data->tahun_pembelian }}</td>
                                                <td>{{ $data->lokasi }}</td>
                                                <td>{{ $data->no_dokumen }}</td>
                                                <td>{{ $data->tgl_dokumen }}</td>
                                                <td>{{ $data->tgl_mulai }}</td>
                                                <td>{{ $data->status_tanah }}</td>
                                                <td>{{ $data->kode_tanah }}</td>
                                                <td>{{ $data->asalusul }}</td>
                                                <td>{{ $data->nilai_kontrak }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabkibg">
                                        <h3>Barang Pakai Habis</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th>No Reg</th>
                                                <th>Merk</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                            </tr>

                                        @foreach($bph as $key => $data)
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->kode_barang }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->merk }}</td>
                                                <td>{{ $data->jumlah }}</td>
                                                <td>{{ $data->harga_satuan }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td>{{ $data->keterangan }}</td>
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