@extends('layouts.master-auth')

@section('title')

    <title>List Barang</title>

@endsection



@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>
                    List Barang
                </h1>

            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel with-nav-tabs panel-primary">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabatk" data-toggle="tab">ATK</a></li>
                                        <li><a href="#tabelektronika" data-toggle="tab">Elektronika</a></li>
                                        <li><a href="#tabmesin" data-toggle="tab">Mesin</a></li>
                                        <li><a href="#tabmeuble" data-toggle="tab">Meuble</a></li>
                                        <li><a href="#tabtanah" data-toggle="tab">Tanah</a></li>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tabatk">
                                        <table class="table table-hover">
                                <tr>
                                    <th>Kode Barang</th>

                                    <th>Nama Barang</th>

                                    <th>Merk</th>

                                    <th>Stok</th>

                                    <th>Satuan</th>

                                    <th>Keterangan</th>

                                    <th>Jenis Barang</th>

                                    <th>Terakhir Dirubah</th>

                                </tr>

                            @foreach($atk as $key => $data)
                                <tr>
                                    <td>{{$data->kode_barang}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->merk}}</td>
                                    <td>{{$data->stok}}</td>
                                    <td>{{$data->satuan}}</td>
                                    <td>{{$data->keterangan}}</td>
                                    <td>{{$data->jenis_barang}}</td>
                                    <td>{{$data->updated_at}}</td>
                                </tr>
                            @endforeach
                            </table>
                                    </div>
                                    <div class="tab-pane fade" id="tabelektronika">Primary 2</div>
                                    <div class="tab-pane fade" id="tabmesin">Primary 3</div>
                                    <div class="tab-pane fade" id="tabmeuble">Primary 4</div>
                                    <div class="tab-pane fade" id="tabtanah">Primary 5</div>
                                </div>
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
        
    </script>


@endsection