@extends('bidang.layouts.master-auth')

@section('title')
    <title>Pilih Ruangan</title>
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
                    Cetak KIR 
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
                            <h3 class="box-title">Pilih Ruangan <font color="green">(Harap refresh halaman setelah mencetak)</font></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" id="form1" action="/bidang/cetak-kir" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select class="form-control" id="ruang" name="ruang">
                                                    <option value="0">--pilih salah satu---</option>
                                                @foreach($ruang as $key => $data)
                                                    <option value="{{$data->id}}">{{$data->ruangan}}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <div class="form-group">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                {{-- <th>Merk</th>
                                                <th>Ukuran</th>
                                                <th>Bahan</th> --}}
                                                <th>No Kode Barang</th>
                                                {{-- <th>Jumlah</th>
                                                <th>Harga Beli</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody id="barang">
                                            @foreach($mesin as $key => $data)
                                            <tr>
                                                <td>{{$data->nama_barang}}</td>
                                                {{-- <td>{{$data->merk}}</td>
                                                <td>{{$data->ukuran}}</td>
                                                <td>{{$data->bahan}}</td> --}}
                                                <td>{{$data->kode_barang}}</td>
                                                {{-- <td>{{$data->jumlah}}</td>
                                                <td>{{$data->harga_satuan}}</td> --}}
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>    
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary hidden" id="submitButton" name="submitButton" value="cetak"><i class="fa fa-print"></i> Cetak KIR</button> 
                                </div>
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
        $(document).ready(function(){
            $('#ruang').on('change', function(e){
                var id  = e.target.value;
                $.get('{{url('bidang/ruang')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#barang').empty();
                    $.each(data, function(index, element){
                        $('#barang').append("<tr><td><input name='barang[]' hidden value='"+element.kode_barang+"'>"+element.nama_barang+"</td><td>"+element.kode_barang+"</td></tr>")
                    });

                });

                if (document.getElementById('ruang').value == 0) {
                    document.getElementById('submitButton').classList.add('hidden');
                } else {
                    document.getElementById('submitButton').classList.remove('hidden');
                }

            });
        });

    </script>


@endsection