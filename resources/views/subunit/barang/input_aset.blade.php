@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Aset Tetap Lainnya</title>
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
                    Input <b>Aset Tetap Lainnya</b>
                </h1>

            </section>  

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                         <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Masukkan data</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="/subunit/storeBarang" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Jenis Barang</label>
                                    <input type="text" class="form-control" list="kodelist" id="barang" onkeyup="generateKode();" onchange="generateKode();">
                                    <datalist id="kodelist">
                                    @foreach($kode as $key => $data)
                                        <option value="{{$data->kode}}" label="{{$data->deskripsi}}"></option>
                                    @endforeach
                                    </datalist>
                                </div>
                                <input type="text" name="kegiatan_id" hidden="" value="{{$pengadaan->kegiatan_id}}">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $pengadaan->nama }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label>Nomor Reg</label>
                                            <input type="text" class="form-control" name="no_reg" value="{{ old('no_reg') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <label>BUKU/PERPUSTAKAAN</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Spesifikasi</label>
                                            <input type="text" class="form-control" name="spesifikasi" value="{{ old('spesifikasi') }}">
                                        </div>
                                    </div>
                                </div>
                                <label>KEBUDAYAAN</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Asal Daerah</label>
                                            <input type="text" class="form-control" name="asal_daerah" value="{{ old('asal_daerah') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pencipta</label>
                                            <input type="text" class="form-control" name="pencipta" value="{{ old('pencipta') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <input type="text" class="form-control" name="bahan" value="{{ old('bahan') }}">
                                        </div>
                                    </div>
                                </div>
                                <label>TERNAK</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <input type="text" class="form-control" name="jenis" value="{{ old('jenis') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran" value="{{ old('ukuran') }}">
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pengadaan->jumlah }}" onkeyup="sum()">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga Satuan (Rp)</label>
                                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $pengadaan->harga_satuan }}" onkeyup="sum()">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Total (Rp)</label>
                                    <input type="number" class="form-control" id="total" name="total" value="{{ $pengadaan->total }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun Cetak</label>
                                            <input type="number" class="form-control" name="tahun_cetak" value="{{ old('tahun_cetak') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Asal Usul</label>
                                            <input type="text" class="form-control" name="asalusul" value="{{ old('asalusul') }}"s>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan">{{ $pengadaan->keterangan }}</textarea>
                                </div>

                                <input type="text" name="kategori_id" value="{{$pengadaan->kategori_id}}" hidden="">
                                <input type="text" name="id" value="{{$pengadaan->id}}" hidden="">
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
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
        function sum(){
            var jum = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga_satuan').value;
            if (jum == "")
                jum = 0;
            if (harga == "")
                harga = 0;

            var result = parseInt(jum) * parseInt(harga);
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
           }
        }

        function generateKode(){
            var kode = document.getElementById('barang').value.toString();
            var banyak = pad({{ $banyak }}+1, 4);
            var newkode = kode+banyak;
            
            document.getElementById('kode_barang').value = newkode;
        }

        function pad(number, length) {
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }
           
            return str;

        }
    </script>


@endsection