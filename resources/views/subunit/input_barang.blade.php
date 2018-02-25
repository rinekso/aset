@extends('subunit.layouts.master-auth')

@section('title')
  
    <title>Input Barang</title>

@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">
            <!-- content-header has breadcrumbs -->

            <section class="content-header">
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


                <h1>
                    Input Barang
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">List Pengadaan</li>
                </ol>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                        <div class="box-header">
                            <h3>List Pengadaan Barang Diterima</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>

                                    <th>Nama Barang</th>

                                    <th>Jumlah</th>

                                    <th>Harga Satuan</th>

                                    <th>Total</th>

                                    <th>Kategori</th>

                                    <th>Nomor BST</th>

                                    <th>Keterangan</th>

                                    <th>Action</th>
                                </tr>
                            @foreach($pengadaan as $key => $data)
                                <tr>    
                                  <td>{{$data->id}}</td>
                                  <td>{{$data->nama}}</td>
                                  <td>{{$data->jumlah}}</td>
                                  <td>{{$data->harga_satuan}}</td>
                                  <td>{{$data->total}}</td>
                                  <td>{{$data->kategori->nama_kategori}}</td>
                                  <td>{{$data->no_bst}}</td>
                                  <td>{{$data->keterangan}}</td>
                                  <td>
                                      <a href="{{url('/subunit/formInputBarang/'.$data->id)}}">
                                          <button class="btn btn-info btn-sm">Input Barang</button>
                                      </a>
                                  </td>
                                </tr>
                            @endforeach
                            
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    </div>
                </div>

            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        
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
    </script>


@endsection