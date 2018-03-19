@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Jalan, Irigasi dan Jaringan</title>
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
                    Input <b>Jalan, Irigasi dan Jaringan</b>
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
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $pengadaan->nama }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control" name="kode_barang" value="{{ old('kode_barang') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label>Nomor Reg</label>
                                            <input type="text" class="form-control" name="no_reg" value="{{ old('no_reg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kontruksi</label>
                                    <input type="text" class="form-control" name="kontruksi" value="{{ old('kontruksi') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Panjang (km)</label>
                                            <input type="number" class="form-control" name="panjang" value="{{ old('panjang') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lebar (m)</label>
                                            <input type="number" class="form-control" name="lebar" value="{{ old('lebar') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Luas (m2)</label>
                                            <input type="number" class="form-control" name="luas" value="{{ old('luas') }}">
                                        </div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penggunaan</label>
                                            <input type="text" class="form-control" name="penggunaan" value="{{ old('penggunaan') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Asal Usul</label>
                                            <input type="text" class="form-control" name="asalusul" value="{{ old('asalusul') }}">
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
    </script>


@endsection