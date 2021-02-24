@extends('layout.main2')

@section('stylesheet')
<link rel="stylesheet" href="/vendors/jstree/dist/themes/default/style.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css" />

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
                    @if(session('success-create'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('success-create')}} 
                    </div>
                    @endif
                    <div class="panel-body">
                        <!-- <a href="{{url('/pok/addchild/root/id/1')}}" class="btn btn-success btn-icon left-icon" role="button">
                            <span class="btn-inner--icon"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn-inner--text">Tambah Child</span>
                        </a></td>
                        <a href="{{url('/pok/addchild/root/id/1')}}" class="btn btn-info btn-icon left-icon" role="button">
                            <span class="btn-inner--icon"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn-inner--text">Ubah</span>
                        </a></td>
                        <a href="{{url('/pok/addchild/root/id/1')}}" class="btn btn-danger btn-icon left-icon" role="button">
                            <span class="btn-inner--icon"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn-inner--text">Hapus</span>
                        </a></td> -->
                        <form id="form-update" action="#" method="GET">
                            <button onclick="onadd()" class="btn btn-success btn-icon left-icon" id="add-button" type="submit" disabled><i class="fa fa-plus"></i>Tambah Child</button>
                            <button onclick="onedit()" class="btn btn-info btn-icon left-icon" id="edit-button" type="button" disabled><i class="fa fa-pencil"></i>Ubah</button>
                            <button onclick="ondelete()" class="btn btn-danger btn-icon left-icon" id="delete-button" type="button" disabled><i class="fa fa-trash"></i>Hapus</button>
                        </form>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datatable-id" class="table table-hover display">
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>ID</th>
                                            <th>parent</th>
                                            <th width="10%">Jenis</th>
                                            <th width="10%">Kode</th>
                                            <th width="40%">Deskripsi</th>
                                            <th width="10%">Volume</th>
                                            <th width="10%">Satuan</th>
                                            <th width="10%">Harga Satuan</th>
                                            <th width="10%">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>root</td>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td><a href="{{url('/pok/addchild/root/id/1')}}" class="btn btn-success btn-icon left-icon" role="button">
                                                    <span class="btn-inner--icon"><i class="fa fa-plus-circle"></i></span>
                                                    <span class="btn-inner--text">Tambah Program</span>
                                                </a></td> -->
                                            <td><strong>ROOT</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach($programs as $program)
                                        <tr>
                                            <td>program</td>
                                            <td>{{$program->kode}}</td>
                                            <td></td>
                                            <td style="background-color: #C4D79B">Program</td>
                                            <td>{{$program->kode}}</td>
                                            <td>{{$program->deskripsi}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$program->jumlah}}</td>
                                        </tr>
                                        @foreach($program->aktivitas as $aktivitas)
                                        <tr>
                                            <td>aktivitas</td>
                                            <td>{{$aktivitas->kode}}</td>
                                            <td>{{$program->kode}}</td>
                                            <td style="background-color: #92CDDC">Aktivitas</td>
                                            <td style="padding: 0px 0px 0px 30px;">{{$aktivitas->kode}}</td>
                                            <td>{{$aktivitas->deskripsi}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$aktivitas->jumlah}}</td>
                                        </tr>
                                        @foreach($aktivitas->kro as $kro)
                                        <tr>
                                            <td>kro</td>
                                            <td>{{$kro->kode}}</td>
                                            <td>{{$aktivitas->kode}}</td>
                                            <td style="background-color: #E6B8B7">KRO</td>
                                            <td style="padding: 0px 0px 0px 60px;">{{$kro->kode}}</td>
                                            <td>{{$kro->deskripsi}}</td>
                                            <td>{{$kro->volume}}</td>
                                            <td>{{$kro->satuan}}</td>
                                            <td></td>
                                            <td>{{$kro->jumlah}}</td>
                                        </tr>
                                        @foreach($kro->ro as $ro)
                                        <tr>
                                            <td>ro</td>
                                            <td>{{$ro->kode}}</td>
                                            <td>{{$kro->kode}}</td>
                                            <td style="background-color: #F9DB6F">RO</td>
                                            <td style="padding: 0px 0px 0px 90px;">{{$ro->kode}}</td>
                                            <td>{{$ro->deskripsi}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$ro->jumlah}}</td>
                                        </tr>
                                        @foreach($ro->komponen as $komponen)
                                        <tr>
                                            <td>komponen</td>
                                            <td>{{$komponen->kode}}</td>
                                            <td>{{$ro->kode}}</td>
                                            <td>Komponen</td>
                                            <td style="padding: 0px 0px 0px 120px;">{{$komponen->kode}}</td>
                                            <td>{{$komponen->deskripsi}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$komponen->jumlah}}</td>
                                        </tr>
                                        @foreach($komponen->subkomponen as $subkomponen)
                                        <tr>
                                            <td>subkomponen</td>
                                            <td>{{$subkomponen->kode}}</td>
                                            <td>{{$komponen->kode}}</td>
                                            <td>Sub Komponen</td>
                                            <td style="padding: 0px 0px 0px 150px;">{{$subkomponen->kode}}</td>
                                            <td>{{$subkomponen->deskripsi}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$subkomponen->jumlah}}</td>
                                        </tr>
                                        @foreach($subkomponen->detil as $detil)
                                        <tr>
                                            <td>detil</td>
                                            <td>{{$detil->id}}</td>
                                            <td>{{$subkomponen->kode}}</td>
                                            <td>Detil</td>
                                            <td></td>
                                            <td>{{$detil->deskripsi}}</td>
                                            <td>{{$detil->volume}}</td>
                                            <td>{{$detil->satuan}}</td>
                                            <td></td>
                                            <td>{{$detil->jumlah}}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endforeach
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
<script>
    var urlidentifier = '';
    var baseidentifier = '';
    var rowselected;

    var table = $('#datatable-id').DataTable({
        "responsive": true,
        "order": [],
        "fixedColumns": true,
        "fixedHeader": true,
        "paging": false,
        "select": {
            "style": "single",
        },
        "createdRow": function(row, data, index) {
            //console.log(row);
            //$(row).css("background-color", "red");
        },
        "columnDefs": [{
                "targets": [0],
                "visible": false,
            },
            {
                "targets": [1],
                "visible": false,
            },
            {
                "targets": [2],
                "visible": false,
            },
        ],
        "language": {
            'paginate': {
                'previous': '<i class="fas fa-angle-left"></i>',
                'next': '<i class="fas fa-angle-right"></i>'
            }
        }
    });

    var addButton = document.getElementById('add-button');
    var editButton = document.getElementById('edit-button');
    var deleteButton = document.getElementById('delete-button');

    table.on('select', function(e, dt, type, indexes) {
        rowselected = dt.row({
            selected: true
        }).index();
        console.log(rowselected);
        var count = table.rows({
            selected: true
        }).count();
        urlidentifier = dt.row({
            selected: true
        }).data()[0] + '/id/' + dt.row({
            selected: true
        }).data()[1];

        if (count > 0) {
            addButton.disabled = false;
            editButton.disabled = false;
            deleteButton.disabled = false;
        } else {
            addButton.disabled = true;
            editButton.disabled = true;
            deleteButton.disabled = true;
        }
    }).on('deselect', function(e, dt, type, indexes) {
        var count = table.rows({
            selected: true
        }).count();
        if (count > 0) {
            addButton.disabled = false;
            editButton.disabled = false;
            deleteButton.disabled = false;
        } else {
            addButton.disabled = true;
            editButton.disabled = true;
            deleteButton.disabled = true;
        }
    });
</script>

<script>
    function onadd() {
        event.preventDefault();
        baseidentifier = '/pok/addchild/';
        //console.log(baseidentifier + urlidentifier);
        $('#form-update').attr('action', baseidentifier + urlidentifier);
        $('#form-update').submit();
    }

    function onedit() {
        event.preventDefault();
        baseidentifier = '/pok/edit/';
        //console.log(baseidentifier + urlidentifier);
        $('#form-update').attr('action', baseidentifier + urlidentifier);
        $('#form-update').submit();
    }

    function ondelete() {
        event.preventDefault();
        baseidentifier = '/pok/delete/';
        //console.log(baseidentifier + urlidentifier);
        $('#form-update').attr('action', baseidentifier + urlidentifier);
        $('#form-update').submit();
    }
</script>

@endsection