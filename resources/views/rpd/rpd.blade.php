@extends('layout.main')

@section('stylesheet')
    <link rel="stylesheet" href="/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('container')

    <style type="text/css">
        th,
        td {
            word-wrap: break-word;
        }

        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }

        tr[role=row] {
            background: white;
        }

    </style>

    <!-- container -->
    <div class="row heading-bg">
        <!-- Breadcrumb -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Rencana Penarikan Anggaran</h5>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#"><span>RPD</span></a></li>
                <li class="active"><span>Lihat</span></li>
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
                        <h6 class="panel-title txt-dark">RPD Daftar POK</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="stripe row-border order-column">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Deskripsi</th>
                                            <th>Volume</th>
                                            <th>Satuan</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Januari</th>
                                            <th>Februari</th>
                                            <th>Maret</th>
                                            <th>April</th>
                                            <th>Mei</th>
                                            <th>Juni</th>
                                            <th>Juli</th>
                                            <th>Agustus</th>
                                            <th>September</th>
                                            <th>Oktober</th>
                                            <th>November</th>
                                            <th>Desember</th>
                                            <th>Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pokitems as $pokitem)
                                            @if ($pokitem->jenis == 'program')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color: #C4D79B">{{ $pokitem->kode }}</td>
                                                        <td style="background-color: white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'aktivitas')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color: #92CDDC">{{ $pokitem->kode }}</td>
                                                        <td style="background-color: white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'kro')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color: #E6B8B7">{{ $pokitem->kode }}</td>
                                                        <td style="background-color: white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'ro')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color: #F9DB6F">{{ $pokitem->kode }}</td>
                                                        <td style="background-color: white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'komponen')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color:white">{{ $pokitem->kode }}</td>
                                                        <td style="background-color:white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'subkomponen')
                                                @if ($pokitem->is_shown)
                                                    <tr>

                                                        <td style="background-color:white">{{ $pokitem->kode }}</td>
                                                        <td style="background-color:white">
                                                            <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @elseif($pokitem->jenis == 'detil')

                                                <tr>
                                                    <td style="background-color:white"></td>

                                                    <td style="background-color:white;">
                                                        <div class="fixed-column">{{ $pokitem->deskripsi }}</div>
                                                    </td>
                                                    <td>{{ $pokitem->volume }}</td>
                                                    <td>{{ $pokitem->satuan }}</td>
                                                    <td>{{ $pokitem->harga_satuan }}</td>
                                                    <td>{{ $pokitem->jumlah }}</td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}jan_rpd" name="jan_rpd" size="10"
                                                            value="{{ $pokitem->jan_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'jan_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}feb_rpd" name="feb_rpd" size="10"
                                                            value="{{ $pokitem->feb_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'feb_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}mar_rpd" name="mar_rpd" size="10"
                                                            value="{{ $pokitem->mar_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'mar_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}apr_rpd" name="apr_rpd" size="10"
                                                            value="{{ $pokitem->apr_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'apr_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}mei_rpd" name="mei_rpd" size="10"
                                                            value="{{ $pokitem->mei_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'mei_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}jun_rpd" name="jun_rpd" size="10"
                                                            value="{{ $pokitem->jun_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'jun_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}jul_rpd" name="jul_rpd" size="10"
                                                            value="{{ $pokitem->jul_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'jul_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}agu_rpd" name="agu_rpd" size="10"
                                                            value="{{ $pokitem->agu_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'agu_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}sep_rpd" name="sep_rpd" size="10"
                                                            value="{{ $pokitem->sep_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'sep_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}okt_rpd" name="okt_rpd" size="10"
                                                            value="{{ $pokitem->okt_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'okt_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}nov_rpd" name="nov_rpd" size="10"
                                                            value="{{ $pokitem->nov_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'nov_rpd')"></td>
                                                    <td><input type="text" style="width: 100px" class="number form-control"
                                                            id="{{ $pokitem->id }}des_rpd" name="des_rpd" size="10"
                                                            value="{{ $pokitem->des_rpd }}"
                                                            onfocusout="saveData('{{ $pokitem->id }}', 'des_rpd')"></td>
                                                    <td id="{{ $pokitem->id }}sisa" style="background-color:white">
                                                        {{ $pokitem->jumlah - $pokitem->jan_rpd - $pokitem->feb_rpd - $pokitem->mar_rpd - $pokitem->apr_rpd - $pokitem->mei_rpd - $pokitem->jun_rpd - $pokitem->jul_rpd - $pokitem->agu_rpd - $pokitem->sep_rpd - $pokitem->okt_rpd - $pokitem->nov_rpd - $pokitem->des_rpd }}
                                                    </td>
                                                    {{-- <td id="{{ $pokitem->id }}sisa"></td> --}}
                                                    <td>
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

    <script src="https://unpkg.com/imask"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "scrollY": "70vh",
                "scrollX": true,
                "scrollCollapse": true,
                "paging": false,
                "ordering": false,
                "fixedColumns": {
                    "leftColumns": 2,
                },
                "columns": [{
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%",
                        "render": function(data, type, row) {
                            if (type === 'display') {
                                if (data) {
                                    return transformPrice(data);
                                }
                            }
                            return data;
                        }
                    },
                    {
                        "width": "10%",
                        "render": function(data, type, row) {
                            if (type === 'display') {
                                if (data) {
                                    return transformPrice(data);
                                }
                            }
                            return data;
                        }
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%",
                        "render": function(data, type, row) {
                            if (type === 'display') {
                                if (data) {
                                    return transformPrice(data);
                                }
                            }
                            return data;
                        }
                    },
                ],
            });
        });

    </script>

    @if (session('success-send'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'RPD sudah diupdate',
                showConfirmButton: false,
                timer: 2500
            })

        </script>
    @endif

    @if (session('fail-send'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Nilai total RPD lebih dari nilai pagu kegiatan',
                showConfirmButton: false,
                timer: 2500
            })

        </script>
    @endif

    <script type="text/javascript">
        var ds = document.getElementsByClassName('number');
        var currencies = [];
        for (var i = 0; i < ds.length; i++) {
            currencies[ds[i].id] = IMask(
                ds[ds[i].id], {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: '.'
                        }
                    }
                }
            );
        }

        function onSubmit() {
            var ds = document.getElementsByClassName('number');
            for (var i = 0; i < ds.length; i++) {
                ds[i].value = currencies[i].masked.unmaskedValue;
            }
        }

    </script>

    <script>
        function saveData(id, column) {
            var element = document.getElementById(id + column);
            var value = currencies[element.id].masked.unmaskedValue;
            if (!value) {
                value = 0;
            }
            $.ajax({
                url: "{{ url('entrirpd/') }}/" + id + "/" + column + "/" + value,
                success: function(result, status, xhr) {
                    if (result.is_success) {
                        element.classList.add("success-input");
                        var sisa = document.getElementById(id + "sisa");
                        sisa.innerHTML = transformPrice(result.sisa);
                    } else {
                        element.classList.add("error-input");
                    }
                },
                error: function(xhr, status, error) {
                    element.classList.add("error-input");

                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Oops...',
                    //     text: 'Something went wrong!',
                    // });
                },
                data: {
                    published: value ? 1 : 0,
                },
                type: "patch",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

    </script>

    <script>
        function transformPrice(price) {
            var parts = price.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

    </script>

@endsection
