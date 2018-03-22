@extends('layouts.master-auth')

@section('title')
    <title>Pengajuan Pengadaan Barang</title>
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
                    Ajukan Pengadaan: {{$kegiatan->nama_kegiatan}}
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Ajukan Pengadaan</li>
                </ol>

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
                        <form role="form" action="/subunit/store-pengadaan" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <input type="text" name="kegiatan_id" hidden value="{{$kegiatan->kode}}">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option value="">--pilih salah satu--</option>
                                    @foreach($kategori as $key => $data)
                                        <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" placeholder="Misal: Mesin Jahit" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Misal: 8" onkeyup="sum();" value="{{ old('jumlah') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga Satuan (Rp)</label>
                                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan" onkeyup="sum();" value="{{ old('harga_satuan') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total (Rp)</label>
                                            <input type="number" disabled class="form-control" id="total" name="total" placeholder="Total">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor BST</label>
                                    <input type="text" name="no_bst" class="form-control" placeholder="Masukkan Nomor BST" value="{{ old('no_bst') }}">
                                </div>

                                <div class="form-group">
                                    <label>Foto BST</label>
                                
                                    <div class="upload-btn-wrapper">
                                      <button class="btn btn-info">Pilih foto</button>
                                      <input type="file" name="foto_bst" id="foto_bst">
                                    </div>
                                    <img src="" id="showbst" style="max-width:200px;max-height:200px; margin-right: 10px" />
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" placeholder="Keteranagan" name="keterangan">{{ old('keterangan') }}</textarea>
                                </div>
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


        $("#foto_bst").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#showbst').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>


@endsection