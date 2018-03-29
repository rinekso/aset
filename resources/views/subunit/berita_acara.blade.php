@extends('subunit.layouts.master-auth')

@section('title')
    <title>Cetak Berita Acara</title>
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
                    Cetak Berita Acara 
                </h1>

            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                         <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pilih berdasarkan BAST</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="/subunit/cetak-bast" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nomor BAST</label>
                                            <select class="form-control" onchange="barang();" id="bast" name="bast">
                                                    <option value="">--pilih salah satu--</option>
                                                @foreach($bast as $key => $data)
                                                    <option value="{{$data->bast}}">{{$data->bast}}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <div class="form-group">
                                <label>Pilih Barang</label>
                                    <table class="table">
                                        <tr>
                                            <th></th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan (Rp)</th>
                                            <th>Total (Rp)</th>
                                        </tr>
                                    @foreach($pengadaan as $key => $data)
                                        <tr class="hidden" id="brg{{$key}}">
                                            <div class="checkbox">
                                                <td>
                                                    <input type="checkbox" name="barang[]" value="{{$data->id}}">
                                                    <input type="checkbox" hidden="" name="brgbast[]" value="{{$data->no_bst}}">

                                                </td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->jumlah}} {{$data->satuan}}</td>
                                                <td>{{$data->harga_satuan}}</td>
                                                <td>{{$data->total}}</td>

                                            </div>
                                        </tr>
                                    @endforeach
                                        
                                    </table>
                                </div>    
                                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Berita Acara</button>
                            </form>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                        </div>
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
        function barang(){
            var bast = document.getElementById("bast").value;
            var banyak = document.getElementsByName("barang[]").length;
            for (var i = 0; i < banyak; i++) {
                document.getElementById("brg"+i).classList.add('hidden');
                document.getElementsByName("barang[]")[i].checked = false;
                if(bast == document.getElementsByName("brgbast[]")[i].value) {
                    document.getElementById("brg"+i).classList.remove('hidden');
                }
            }
        }
    </script>


@endsection