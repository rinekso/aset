@extends('subunit.layouts.master-auth')

@section('title')
    <title>Input Kegiatan Baru</title>
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
                <h1>Kegiatan Baru</h1>
            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Masukkan data</h3>
                            </div>
                            <div class="box-body">
                                <form role="form" action="/subunit/store-kegiatan" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" list="nama_keg" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan')}}" class="form-control" onkeyup="kegi();" onchange="kegi();">
                                    <datalist id="nama_keg">
                                        @foreach($kodekeg as $key => $data)
                                            <option value="{{$data->nama_kegiatan}}" label="{{$data->kode}}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Kode Kegiatan</label>
                                        <input type="text" class="form-control" list="keg" id="kode_kegiatan" name="kode_kegiatan" onkeyup="kegi();" onchange="kegi();" readonly>
                                        <datalist id="keg">
                                        @foreach($kodekeg as $key => $data)
                                            <option value="{{$data->kode}}" label="{{$data->nama_kegiatan}}"></option>
                                        @endforeach
                                        </datalist>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tanggal Kegiatan</label>
                                    <input type="date" name="tgl_kegiatan" class="form-control" value="{{old('tgl_kegiatan')}}">
                                </div>
                                <div class="col-md-8"></div>
                                <div class="form-group col-md-12 hidden">
                                    <label>Kode Kegiatan (otomatis)</label>
                                    <input type="text" class="form-control" id="kode" name="kode" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
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
        function generateKode(){
            var kode = document.getElementById('kode_kegiatan').value.toString();
            var banyakkeg = pad({{ $banyakkeg }}, 4);
            var newkode = kode+banyakkeg;
            
            document.getElementById('kode').value = newkode;
        }

        function pad(number, length) {
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }
           
            return str;
        }

        function kegi(){
            generateKode();
            var banyak = document.getElementById('keg').options.length;
            for (var i = 0; banyak ; i++) {
                if (document.getElementById('nama_kegiatan').value == document.getElementById('keg').options[i].label) {
                    document.getElementById('kode_kegiatan').value = document.getElementById('keg').options[i].value
                }
            }

            // var banyak = document.getElementById('keg').options.length;
            // for (var i = 0; banyak ; i++) {
            //     if (document.getElementById('kegiatan').value == document.getElementById('nama_keg').options[i].label) {
            //         document.getElementById('nama_kegiatan').value = document.getElementById('nama_keg').options[i].value
            //     }
            // }

        }

    </script>

    


@endsection