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
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Masukkan data</h3>
                            </div>
                            <div class="box-body">
                                <form role="form" action="/subunit/store-kegiatan" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Jenis Kegiatan</label>
                                    <input type="text" class="form-control" list="keg" id="kegiatan" onkeyup="generateKode();" onchange="generateKode();">
                                    <datalist id="keg">
                                    @foreach($kodekeg as $key => $data)
                                        <option value="{{$data->kode}}" label="{{$data->nama_kegiatan}}"></option>
                                    @endforeach
                                    </datalist>
                                    <p id="namakeg"></p>
                                </div>
                                <div class="form-group">
                                    <label>Kode Kegiatan (otomatis)</label>
                                    <input type="text" class="form-control" id="kode_kegiatan" name="kode_kegiatan" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan')}}" class="form-control" placeholder="Isi Nama Kegiatan">
                                </div>
                                <div class="form-group">
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
            var kode = document.getElementById('kegiatan').value.toString();
            var banyakkeg = pad({{ $banyakkeg }}, 4);
            var newkode = kode+banyakkeg;
            
            document.getElementById('kode_kegiatan').value = newkode;

            // var keg = document.getElementById('keg').selectedIndex;
            // var text = document.getElementsByTagName("option")[keg].label;
            // console.log(text);
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