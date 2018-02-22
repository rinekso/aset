@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Barang Mesin</title>
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
                    Input Barang <b>Mesin</b>
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
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" value="{{ old('kode_barang') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $pengadaan->nama }}" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Merk</label>
                                            <input type="text" class="form-control" name="merk" value="{{ old('merk') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran" value="{{ old('ukuran') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <input type="text" class="form-control" name="bahan" value="{{ old('bahan') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Pabrik</label>
                                    <input type="text" class="form-control" name="no_pabrik" value="{{ old('no_pabrik') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rangka</label>
                                    <input type="text" class="form-control" name="no_rangka" value="{{ old('no_rangka') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Mesin</label>
                                    <input type="text" class="form-control" name="no_mesin" value="{{ old('no_mesin') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pengadaan->jumlah }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga Satuan (Rp)</label>
                                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $pengadaan->harga_satuan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total (Rp)</label>
                                            <input type="number" readonly class="form-control" id="total" name="total" value="{{ $pengadaan->total }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" placeholder="Isi dengan lokasi penempatan" name="lokasi" value="{{ old('lokasi') }}">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan" readonly>{{ $pengadaan->keterangan }}</textarea>
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