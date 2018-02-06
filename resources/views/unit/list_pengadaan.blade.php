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
                            <div class="box-body">
                                <table class="table" id="table_pengadaan">
                                    <thead>
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

                                            <!-- <th>Action</th> -->

                                        </tr>

                                    </thead>
                                    <!-- <tbody>
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                    </tbody> -->

                                </table>
                            </div>
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

    <!-- DataTables -->
    <script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#table_pengadaan').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                colReorder: true,
                
                columns: [
                    { data: 'nama'},
                    { data: 'jumlah'},,
                    { data: 'harga_satuan'},
                    { data: 'total'},
                    { data: 'id_kategori'},
                    { data: 'no_spk'},
                    { data: 'keterangan'},
                    { data: 'status_unit'},
                    { data: 'status_bidang'},
                    { data: 'id_user'},
                ],
                
            });
        });
    </script>


@endsection