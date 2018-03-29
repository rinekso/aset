@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Kontruksi dalam Pengerjaan</title>
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
                    Input <b>Kontruksi dalam Pengerjaan</b>
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
                                <input type="text" name="kegiatan_id" hidden="" value="{{$pengadaan->kegiatan_id}}">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $pengadaan->nama }}">
                                </div>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bangunan</label>
                                            <select class="form-control" name="bangunan">
                                                <option value="P" @if (old('kondisi') == "P") {{ 'selected' }} @endif>P</option>
                                                <option value="SP" @if (old('kondisi') == "SP") {{ 'selected' }} @endif>SP</option>
                                                <option value="D" @if (old('kondisi') == "D") {{ 'selected' }} @endif>D</option>
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
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai" value="{{ old('tgl_mulai') }}">
                                </div>
                                <div class="form-group">
                                    <label>Status tanah</label>
                                    <input type="text" class="form-control" name="status_tanah" value="{{ old('status_tanah') }}">
                                </div>
                                <div class="form-group">
                                    <label>Kode tanah</label>
                                    <input type="text" class="form-control" name="kode_tanah" value="{{ old('kode_tanah') }}">
                                </div>
                                <div class="form-group">
                                    <label>Asal Usul</label>
                                    <input type="text" class="form-control" name="asalusul" value="{{ old('asalusul') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Kontrak (Rp)</label>
                                    <input type="number" class="form-control" name="nilai_kontrak" value="{{ $pengadaan->total }}">
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