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
                        <h6 class="panel-title txt-dark">Tambah Detil</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form autocomplete="off" onsubmit="return onSubmit()" action="/pok" data-toggle="validator" role="form" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Program</label>
                                <input type="text" class="form-control" value="{{$parent->komponen->ro->kro->aktivitas->program->kode}} {{$parent->komponen->ro->kro->aktivitas->program->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Aktivitas</label>
                                <input type="text" class="form-control" value="{{$parent->komponen->ro->kro->aktivitas->kode}} {{$parent->komponen->ro->kro->aktivitas->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">KRO</label>
                                <input type="text" class="form-control" value="{{$parent->komponen->ro->kro->kode}} {{$parent->komponen->ro->kro->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">RO</label>
                                <input type="text" class="form-control" value="{{$parent->komponen->ro->kode}} {{$parent->komponen->ro->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Komponen</label>
                                <input type="text" class="form-control" value="{{$parent->komponen->kode}} {{$parent->komponen->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Sub Komponen</label>
                                <input type="text" class="form-control" value="{{$parent->kode}} {{$parent->deskripsi}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Deskripsi Detil</label>
                                <input type="text" class="form-control" placeholder="Deskripsi Detil" name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Volume</label>
                                <input type="number" min="0" class="form-control" placeholder="Volume" name="volume" value="{{old('volume')}}">
                                @error('volume')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Satuan</label>
                                <input type="text" class="form-control" placeholder="Satuan" name="unit" value="{{old('unit')}}">
                                @error('unit')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Harga Satuan</label>
                                <input id="unit_price" type="text" min="0" class="form-control" placeholder="Harga Satuan" name="unit_price" value="{{old('unit_price')}}">
                                @error('unit_price')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Jumlah</label>
                                <input id="total" type="text" class="form-control" placeholder="Jumlah" name="total" value="{{old('total')}}">
                                @error('total')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Fungsi</label>
                                <select class="form-control select2" name="department">
                                    <option disabled selected>-- Pilih Fungsi --</option>
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}" {{ old('department') == $department->id ? 'selected' : '' }}>{{$department->nama}}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Jenis Belanja</label>
                                <select class="form-control select2" name="detiltype">
                                    <option disabled selected>-- Jenis Belanja --</option>
                                    @foreach($detiltypes as $detiltype)
                                    <option value="{{$detiltype->id}}" {{ old('detiltype') == $detiltype->id ? 'selected' : '' }}>{{$detiltype->nama}}</option>
                                    @endforeach
                                </select>
                                @error('detiltype')
                                <div class="mt-10"><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </div>
                            <input type="hidden" value="1" name="id">
                            <input type="hidden" value="detil" name="create_type">
                            <input type="hidden" value="{{$parent->id}}" name="parent_id">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('optionaljs')
<script src="/vendors/imask/imask.js"></script>

<script type="text/javascript">
    var totalMask = IMask(
        document.getElementById('total'), {
            mask: 'Rp num',
            blocks: {
                num: {
                    mask: Number,
                    thousandsSeparator: '.'
                }
            }
        }
    );

    var unitPriceMask = IMask(
        document.getElementById('unit_price'), {
            mask: 'Rp num',
            blocks: {
                num: {
                    mask: Number,
                    thousandsSeparator: '.'
                }
            }
        }
    );

    function onSubmit() {
        document.getElementById('total').value = totalMask.masked.unmaskedValue;
        document.getElementById('unit_price').value = unitPriceMask.masked.unmaskedValue;
    }
</script>
@endsection