@extends('unit.layouts.master-auth')

@section('css')

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}"> -->

@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">
            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Pengadaan <strong>{{Auth::user()->name}}</strong>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">List Pengadaan</li>
                </ol>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                        <div class="box-header">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>Nama Barang</th>

                                    <th>Jumlah</th>

                                    <th>Harga Satuan</th>

                                    <th>Total</th>

                                    <th>Kategori</th>

                                    <th>Nomor SPK</th>

                                    <th>Keterangan</th>

                                    <th>Status Unit</th>

                                    <th>Status Bidang</th>

                                    <th>Pengaju</th>

                                    <th>Action</th>
                                </tr>
                            @foreach($pengadaan as $key => $data)
                                <tr>    
                                  <td>{{$data->nama}}</td>
                                  <td>{{$data->jumlah}}</td>
                                  <td>{{$data->harga_satuan}}</td>
                                  <td>{{$data->total}}</td>
                                  <td>{{$data->id_kategori}}</td>
                                  <td>{{$data->no_spk}}</td>
                                  <td>{{$data->keterangan}}</td>
                                  <td>{{$data->status_unit}}</td>
                                  <td>{{$data->status_bidang}}</td>
                                  <td>{{$data->id_user}}</td>
                                  <td>
                                    <a href="{{url('/unit/approve/'.$data->id)}}">
                                        <button class="btn btn-success btn-xs">
                                        Approve</button>
                                    </a>
                                    <a href="{{url('/unit/tolak/'.$data->id)}}">
                                        <button class="btn btn-danger btn-xs">Tolak</button>
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