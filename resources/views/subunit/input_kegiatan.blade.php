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
                    <div class="col-md-11">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Masukkan data</h3>
                            </div>
                            <div class="box-body">
                                <form role="form" action="/subunit/store-kegiatan" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-8">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" list="nama_keg" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan')}}" class="form-control" onkeyup="kegi();" onchange="kegi();">
                                    <datalist id="nama_keg">
                                        @foreach($kodekeg as $key => $data)
                                            <option value="{{$data->nama_kegiatan}}" label="{{$data->kode}}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-md-2">
                                    <label>Tahun Kegiatan</label>
                                    <input type="number" name="tahun" class="form-control" value="{{old('tahun')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode Kegiatan</label>
                                    <input type="text" class="form-control" list="keg" id="kode_kegiatan" name="kode_kegiatan" onkeyup="kegi();" onchange="kegi();" readonly>
                                    <datalist id="keg">
                                    @foreach($kodekeg as $key => $data)
                                        <option value="{{$data->kode}}" label="{{$data->nama_kegiatan}}"></option>
                                    @endforeach
                                    </datalist>
                                </div>
                                <div class="form-group col-md-12 hidden">
                                    <label>Kode Kegiatan (otomatis)</label>
                                    <input type="text" class="form-control" id="kode" name="kode" readonly>
                                </div>
                                <div class="row"></div>
                                <hr width="100%">
                            
                                {{-- Nama Pegawai --}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Pengguna Anggaran</label>
                                        <input type="text" name="pengguna" class="form-control form-green">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" name="nip1" class="form-control form-green">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" list="jabatan1" name="jabatan1" class="form-control form-green">
                                        <datalist id="jabatan1">
                                        @foreach($subunit as $key => $data)
                                            <option value="{{$data->nama_subunit}}" label="{{$data->nama_subunit}}"></option>
                                        @endforeach
                                    </datalist>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>PPTK</label>
                                        <input type="text" name="pptk" class="form-control form-yellow">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" name="nip2" class="form-control form-yellow">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" list="jabatan2" name="jabatan2" class="form-control form-yellow">
                                        <datalist id="jabatan2">
                                        @foreach($subunit as $key => $data)
                                            <option value="{{$data->nama_subunit}}" label="{{$data->nama_subunit}}"></option>
                                        @endforeach
                                    </div>
                                </div>
                                <hr width="100%">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Pejabat Pemakai Usaha Pengguna Barang</label>
                                        <input type="text" name="pejabat" class="form-control form-blue">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" name="nip3" class="form-control form-blue">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" list="jabatan3" name="jabatan3" class="form-control form-blue">
                                        <datalist id="jabatan3">
                                        @foreach($subunit as $key => $data)
                                            <option value="{{$data->nama_subunit}}" label="{{$data->nama_subunit}}"></option>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Pengurus</label>
                                        <input type="text" name="pengurus" class="form-control form-purple">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" name="nip4" class="form-control form-purple">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" list="jabatan4" name="jabatan4" class="form-control form-purple">
                                        <datalist id="jabatan4">
                                        @foreach($subunit as $key => $data)
                                            <option value="{{$data->nama_subunit}}" label="{{$data->nama_subunit}}"></option>
                                        @endforeach
                                    </div>
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