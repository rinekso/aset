@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Bangunan</title>
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
                    Input <b>Bangunan</b>
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
                                            <input type="text" class="form-control" id="kode_barang" readonly="" name="kode_barang" value="{{ old('kode_barang') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label>Nomor Reg</label>
                                            <input type="text" class="form-control" name="no_reg" value="{{ old('no_reg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kondisi Bangunan</label>
                                            <select class="form-control" name="kondisi">
                                                <option value="B" @if (old('kondisi') == "B") {{ 'selected' }} @endif>B</option>
                                                <option value="KB" @if (old('kondisi') == "KB") {{ 'selected' }} @endif>KB</option>
                                                <option value="RB" @if (old('kondisi') == "RB") {{ 'selected' }} @endif>RB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bertingkat</label>
                                            <select class="form-control" name="bertingkat">
                                                <option value="ya" @if (old('bertingkat') == "ya") {{ 'selected' }} @endif>Ya</option>
                                                <option value="tidak" @if (old('bertingkat') == "tidak") {{ 'selected' }} @endif>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Beton</label>
                                            <select class="form-control" name="beton">
                                                <option value="ya" @if (old('beton') == "ya") {{ 'selected' }} @endif>Ya</option>
                                                <option value="tidak" @if (old('beton') == "tidak") {{ 'selected' }} @endif>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Luas (m2)</label>
                                            <input type="number" class="form-control" name="luas" value="{{ old('luas') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No Dokumen</label>
                                            <input type="text" class="form-control" name="no_dokumen" value="{{ old('no_dokumen') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Dokumen</label>
                                            <input type="date" class="form-control" name="tgl_dokumen" value="{{ old('tgl_dokumen') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Harga (Rp)</label>
                                    <input type="number" class="form-control" name="harga" value="{{ $pengadaan->total }}">
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