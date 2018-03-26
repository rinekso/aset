@extends('subunit.layouts.master-auth')

@section('title')
    <title>Cetak Berita Acara</title>
@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- content-header has breadcrumbs -->
        <section class="content-header">

            <h1>
               Cetak Berita Acara
            </h1>
        </section>
        <!-- end content-header section -->
        
        <!-- content -->
        <section class="content">
            <div class="box col-md-6">
                <div class="box-header with-border">
                    <h3 class="box-title">Pilih BAST</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        {{-- <form role="form" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Nomor BAST</label>
                                <select class="form-control">
                                    @foreach($bast as $key => $data)
                                        <option value="{{$data->bast}}">{{$data->bast}}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Barang</label>
                                @foreach($pengadaan as $key => $data)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="barang[]" value="{{$data->id}}">{{$data->nama}}
                                        </label>    
                                    </div>
                                @endforeach
                            </div>
                        </form>
                        <button>tes</button> --}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- end content section -->
    </div>
    <!-- end content-wrapper -->

@endsection


