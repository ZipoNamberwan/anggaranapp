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
            <li><a href="#"><span>LDS</span></a></li>
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
                    <h6 class="panel-title txt-dark">LDS Daftar POK</h6>
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
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}jan_lds" name="jan_lds" size="10" value="{{ $pokitem->jan_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'jan_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}feb_lds" name="feb_lds" size="10" value="{{ $pokitem->feb_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'feb_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}mar_lds" name="mar_lds" size="10" value="{{ $pokitem->mar_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'mar_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}apr_lds" name="apr_lds" size="10" value="{{ $pokitem->apr_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'apr_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}mei_lds" name="mei_lds" size="10" value="{{ $pokitem->mei_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'mei_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}jun_lds" name="jun_lds" size="10" value="{{ $pokitem->jun_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'jun_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}jul_lds" name="jul_lds" size="10" value="{{ $pokitem->jul_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'jul_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}agu_lds" name="agu_lds" size="10" value="{{ $pokitem->agu_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'agu_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}sep_lds" name="sep_lds" size="10" value="{{ $pokitem->sep_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'sep_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}okt_lds" name="okt_lds" size="10" value="{{ $pokitem->okt_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'okt_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}nov_lds" name="nov_lds" size="10" value="{{ $pokitem->nov_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'nov_lds')"></td>
                                        <td><input type="text" style="width: 100px" class="number form-control" id="{{ $pokitem->id }}des_lds" name="des_lds" size="10" value="{{ $pokitem->des_lds }}" onfocusout="saveData('{{ $pokitem->id }}', 'des_lds')"></td>
                                        <td id="{{ $pokitem->id }}sisa" style="background-color:white">
                                            {{ $pokitem->jumlah - $pokitem->jan_lds - $pokitem->feb_lds - $pokitem->mar_lds - $pokitem->apr_lds - $pokitem->mei_lds - $pokitem->jun_lds - $pokitem->jul_lds - $pokitem->agu_lds - $pokitem->sep_lds - $pokitem->okt_lds - $pokitem->nov_lds - $pokitem->des_lds }}
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
        element.classList.remove('success-input');
        element.classList.remove('error-input');
        $.ajax({
            url: "{{ url('entrilds/') }}/" + id + "/" + column + "/" + value,
            success: function(result, status, xhr) {
                if (result.is_success) {
                    element.classList.add("success-input");
                    var sisa = document.getElementById(id + "sisa");
                    sisa.innerHTML = transformPrice(result.sisa);
                } else {
                    element.classList.add("error-input");
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Simpan',
                        text: result.message ? result.message : 'Ada Kesalahan. Hubungi Admin',
                    });
                }
            },
            error: function(xhr, status, error) {
                element.classList.add("error-input");
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