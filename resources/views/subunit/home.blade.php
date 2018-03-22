@extends('subunit.layouts.master-auth')

@section('title')
    <title>Dashboard SubUnit</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- content-header has breadcrumbs -->
        <section class="content-header">

            <h1>
                Dashboard Sub Unit
                <small>you are logged in!</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">User Dashboard</li>
            </ol>

        </section>
        <!-- end content-header section -->
        
        <!-- content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button> --}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td class="col-sm-1">Nama</td>
                                <td class="col-sm-1">:</td>
                                <th>{{ $profile->nama }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <th>{{ $profile->role->role }}</td>
                            </tr>
                            <tr>
                                <td>Subunit</td>
                                <td>:</td>
                                <th>{{ $profile->subunit->nama_subunit }}</td>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>:</td>
                                <th>{{ $profile->unit->nama_unit }}</td>
                            </tr>
                            <tr>
                                <td>Induk</td>
                                <td>:</td>
                                <th>{{ $profile->induk->nama_induk }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- end content section -->
    </div>
    <!-- end content-wrapper -->

@endsection


