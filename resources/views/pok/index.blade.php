@extends('layout.main')

@section('stylesheet')
<link rel="stylesheet" href="/vendors/jstree/dist/themes/default/style.min.css" />

@endsection

@section('container')

<div class="container">

    <!-- container -->
    <div class="row heading-bg">
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>speciality pages</span></a></li>
                <li class="active"><span>blank page</span></li>
            </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /container -->

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Master POK</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datatable-id" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th colspan="6" width="10%">Kode</th>
                                            <th width="30%">Deskripsi</th>
                                            <th width="10%">Volume</th>
                                            <th width="10%">Satuan</th>
                                            <th width="10%">Harga Satuan</th>
                                            <th width="10%">Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form >
                                    @foreach($programs as $program)
                                        <tr>
                                            <td colspan="6">{{$program->kode}}</td>
                                            <td colspan="5">{{$program->deskripsi}}
                                                <!-- <button class="btn btn-primary btn-icon-anim btn-circle btn-sm"><i class="fa fa-plus"></i></button>
                                                <button class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash-o"></i></button> -->
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-icon-anim btn-circle btn-sm"><i class="fa fa-plus"></i></button>
                                                <button class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        @foreach($program->aktivitas as $aktivitas)
                                        <tr>
                                            <td></td>
                                            <td colspan="5">{{$aktivitas->kode}}</td>
                                            <td colspan="5">{{$aktivitas->deskripsi}}</td>
                                        </tr>
                                        @foreach($aktivitas->kro as $kro)
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="4">{{$kro->kode}}</td>
                                            <td colspan="5">{{$kro->deskripsi}}</td>
                                        </tr>
                                        @foreach($kro->ro as $ro)
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="3">{{$ro->kode}}</td>
                                            <td colspan="5">{{$ro->deskripsi}}</td>
                                        </tr>
                                        @foreach($ro->komponen as $komponen)
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="2">{{$komponen->kode}}</td>
                                            <td colspan="5">{{$komponen->deskripsi}}</td>
                                        </tr>
                                        @foreach($komponen->subkomponen as $subkomponen)
                                        <tr>
                                            <td colspan="5"></td>
                                            <td colspan="1">{{$subkomponen->kode}}</td>
                                            <td colspan="5">{{$subkomponen->deskripsi}}</td>
                                        </tr>
                                        @foreach($subkomponen->detil as $detil)
                                        <tr>
                                            <td colspan="6"></td>
                                            <td>{{$detil->deskripsi}}</td>
                                            <td>{{$detil->volume}}</td>
                                            <td>{{$detil->satuan}}</td>
                                            <td>{{$detil->satuan}}</td>
                                            <td>{{$detil->jumlah}}</td>
                                            <td><input type="text" name="rpd_jan" value="90"/></td>
                                            <td><input type="text" name="rpd_feb"/></td>
                                            <td><input type="text" name="rpd_mar"/></td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </form>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('optionaljs')

<script>
    var table = $('#datatable-id').DataTable({
        "responsive": true,
        "fixedColumns": true,
        "fixedHeader": true,
        "paging": false,
        "language": {
            'paginate': {
                'previous': '<i class="fas fa-angle-left"></i>',
                'next': '<i class="fas fa-angle-right"></i>'
            }
        }
    });
</script>

@endsection