@extends('layout.main2')

@section('stylesheet')
    <link rel="stylesheet" href="/vendors/jstree/dist/themes/default/style.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="/vendors/fab/src/bubbler.min.css">

@endsection

@section('container')

    <!-- container -->
    <div class="row heading-bg">
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>Master POK</span></a></li>
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
                    @if (session('success-create'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>{{ session('success-create') }}
                        </div>
                    @endif
                    @if (session('success-delete'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>{{ session('success-delete') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div style="display: flex;">
                            <form style="display: none" id="form-add" action="#" method="GET" class="mr-10">
                                <button onclick="onadd()" class="btn btn-success btn-icon left-icon" id="add-button"
                                    type="button" disabled><i class="fa fa-plus"></i>Tambah Child</button>
                            </form>
                            <form style="display: none" id="form-edit" action="#" method="GET" class="mr-10">
                                <!-- <button onclick="onedit()" class="btn btn-info btn-icon left-icon" id="edit-button" type="button" disabled><i class="fa fa-pencil"></i>Ubah</button> -->
                            </form>
                            <form style="display: none" id="form-changepos" action="#" method="GET" class="mr-10">
                                <!-- <button onclick="onedit()" class="btn btn-info btn-icon left-icon" id="edit-button" type="button" disabled><i class="fa fa-pencil"></i>Ubah</button> -->
                            </form>
                            <form style="display: none" id="form-delete" action="#" method="POST" class="mr-10">
                                @csrf
                                @method('delete')
                                <!-- <button onclick="ondelete()" class="btn btn-danger btn-icon left-icon d-inline" id="delete-button" type="button" disabled><i class="fa fa-trash"></i>Hapus</button> -->
                            </form>
                        </div>
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
                                            <th width="10%">Fungsi</th>
                                            <th width="10%">Jenis Belanja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>root</td>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td><a href="#" class="btn btn-success btn-icon left-icon" role="button">
                                                            <span class="btn-inner--icon"><i class="fa fa-plus-circle"></i></span>
                                                            <span class="btn-inner--text">Tambah Program</span>
                                                        </a></td> -->
                                            <td><strong>ROOT</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach ($pokitems as $pokitem)
                                            @if ($pokitem->jenis == 'program')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>{{ $pokitem->jenis }}</td>
                                                        <td>{{ $pokitem->kode }}</td>
                                                        <td></td>
                                                        <td style="background-color: #C4D79B">Program</td>
                                                        <td>{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'aktivitas')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>{{ $pokitem->jenis }}</td>
                                                        <td>{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->program->kode }}</td>
                                                        <td style="background-color: #92CDDC">Aktivitas</td>
                                                        <td style="padding: 0px 0px 0px 30px;">{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'kro')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>kro</td>
                                                        <td>{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->aktivitas->kode }}</td>
                                                        <td style="background-color: #E6B8B7">KRO</td>
                                                        <td style="padding: 0px 0px 0px 60px;">{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td>{{ $pokitem->volume }}</td>
                                                        <td>{{ $pokitem->satuan }}</td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'ro')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>ro</td>
                                                        <td>{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->kro->kode }}</td>
                                                        <td style="background-color: #F9DB6F">RO</td>
                                                        <td style="padding: 0px 0px 0px 90px;">{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'komponen')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>komponen</td>
                                                        <td>{{ $pokitem->id }}</td>
                                                        <td>{{ $pokitem->ro->kode }}</td>
                                                        <td>Komponen</td>
                                                        <td style="padding: 0px 0px 0px 120px;">{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'subkomponen')
                                                @if ($pokitem->is_shown)
                                                    <tr>
                                                        <td>subkomponen</td>
                                                        <td>{{ $pokitem->id }}</td>
                                                        <td>{{ $pokitem->komponen->id }}</td>
                                                        <td>Sub Komponen</td>
                                                        <td style="padding: 0px 0px 0px 150px;">{{ $pokitem->kode }}</td>
                                                        <td>{{ $pokitem->deskripsi }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pokitem->jumlah }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'detil')
                                                <tr>
                                                    <td>detil</td>
                                                    <td>{{ $pokitem->id }}</td>
                                                    <td>{{ $pokitem->subkomponen->id }}</td>
                                                    <td>Detil</td>
                                                    <td></td>
                                                    <td>{{ $pokitem->deskripsi }}</td>
                                                    <td>{{ $pokitem->volume }}</td>
                                                    <td>{{ $pokitem->satuan }}</td>
                                                    <td>{{ $pokitem->harga_satuan }}</td>
                                                    <td>{{ $pokitem->jumlah }}</td>
                                                    <td>{{ $pokitem->fungsi->nama }}</td>
                                                    <td>{{ $pokitem->jenisbelanja->nama }}</td>
                                                </tr>
                                            @endif
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

@endsection

@section('optionaljs')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.js">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="/vendors/fab/src/bubbler.min.js"></script>

    <script>
        var options = [{
                icon: '<i class="fa fa-plus" aria-hidden="true"></i>',
                label: 'Tambah Child',
                display: {
                    color: 'white',
                    background: '#22af47'
                },
                callback: function() {
                    onadd();
                }
            },
            {
                icon: '<i class="fa fa-pencil" aria-hidden="true"></i>',
                label: 'Ubah',
                display: {
                    color: 'white',
                    background: '#ed1b60'
                },
                callback: function() {
                    onedit();
                }
            },
            {
                icon: '<i class="fa fa-trash" aria-hidden="true"></i>',
                label: 'Hapus',
                display: {
                    color: 'white',
                    background: '#f83f37'
                },
                callback: function() {
                    ondelete();
                }
            },
            {
                icon: '<i class="fa fa-arrows" aria-hidden="true"></i>',
                label: 'Ubah Posisi Child',
                display: {
                    color: 'white',
                    background: '#0092ee'
                },
                callback: function() {
                    onchangepos();
                }
            }
        ];

        var context = new Bubbler(options);

    </script>
    <script>
        var urlidentifier = '';
        var baseidentifier = '';
        var rowselected;
        var kodeselected = '';
        var nameselected = '';
        var typeselected = '';

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
            "columns": [{
                    "responsivePriority": 10,
                }, {
                    "responsivePriority": 9,
                }, {
                    "responsivePriority": 8,
                }, {
                    "responsivePriority": 3,
                    "width": "10%",
                    "orderable": false
                }, {
                    "responsivePriority": 1,
                    "width": "10%",
                    "orderable": false
                }, {
                    "responsivePriority": 2,
                    "width": "40%",
                    "orderable": false
                }, {
                    "responsivePriority": 5,
                    "width": "10%",
                    "orderable": false,
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            if (data) {
                                var parts = data.toString().split(".");
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                return parts.join(".");
                            }
                        }
                        return data;
                    }
                },
                {
                    "responsivePriority": 6,
                    "width": "10%",
                    "orderable": false
                }, {
                    "responsivePriority": 7,
                    "width": "10%",
                    "orderable": false,
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            if (data) {
                                var parts = data.toString().split(".");
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                return "Rp " + parts.join(".");
                            }
                        }
                        return data;
                    }
                },
                {
                    "responsivePriority": 4,
                    "width": "10%",
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            if (data) {
                                var parts = data.toString().split(".");
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                return "Rp " + parts.join(".");
                            }
                        }
                        return data;
                    }
                },
                {
                    "responsivePriority": 11,
                    "width": "10%",
                    "orderable": false
                },
                {
                    "responsivePriority": 12,
                    "width": "10%",
                    "orderable": false
                },
            ],
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

        var bubblerwrapper = document.getElementById('bubbler-wrapper');
        bubblerwrapper.style.display = 'none';

        table.on('select', function(e, dt, type, indexes) {
            rowselected = dt.row({
                selected: true
            }).index();
            // console.log(dt.row({
            //     selected: true
            // }).data());
            var count = table.rows({
                selected: true
            }).count();
            urlidentifier = dt.row({
                selected: true
            }).data()[0] + '/id/' + dt.row({
                selected: true
            }).data()[1];
            kodeselected = dt.row({
                selected: true
            }).data()[4];
            nameselected = dt.row({
                selected: true
            }).data()[5];
            typeselected = dt.row({
                selected: true
            }).data()[3];

            if (count > 0) {
                bubblerwrapper.style.display = 'block';
            } else {
                bubblerwrapper.style.display = 'none';
            }
        }).on('deselect', function(e, dt, type, indexes) {
            var count = table.rows({
                selected: true
            }).count();
            if (count > 0) {
                bubblerwrapper.style.display = 'block';
            } else {
                bubblerwrapper.style.display = 'none';
            }
        });

    </script>

    <script>
        function onadd() {
            event.preventDefault();
            baseidentifier = '/pok/addchild/';
            //console.log(baseidentifier + urlidentifier);
            $('#form-add').attr('action', baseidentifier + urlidentifier);
            $('#form-add').submit();
        }

        function onedit() {
            event.preventDefault();
            baseidentifier = '/pok/edit/';
            //console.log(baseidentifier + urlidentifier);
            $('#form-edit').attr('action', baseidentifier + urlidentifier);
            $('#form-edit').submit();
        }

        function ondelete() {
            event.preventDefault();
            baseidentifier = '/pok/delete/';
            //console.log(baseidentifier + urlidentifier);
            $('#form-delete').attr('action', baseidentifier + urlidentifier);
            Swal.fire({
                title: 'Yakin Hapus ' + typeselected + ' Ini?',
                text: kodeselected + ' ' + nameselected,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete').submit();
                }
            })
        }

        function onchangepos() {
            event.preventDefault();
            baseidentifier = '/pok/changepos/';
            //console.log(baseidentifier + urlidentifier);
            $('#form-changepos').attr('action', baseidentifier + urlidentifier);
            $('#form-changepos').submit();
        }

    </script>

    @if (session('error-delete'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Gagal Hapus',
                    text: "{{ session('error-delete') }}",
                    icon: 'error',
                    confirmButtonText: 'OK',
                })
            });

        </script>
    @endif

@endsection
