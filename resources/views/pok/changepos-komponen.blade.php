@extends('layout.main2')

@section('stylesheet')
<link rel="stylesheet" href="/vendors/jstree/dist/themes/default/style.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css" />
<link rel="stylesheet" href="/style.css" />

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
                        <h2 class="panel-title txt-dark">Ubah Posisi Komponen</h2>
                        <p class="mb-0"><small>Menu Ubah Posisi digunakan untuk mengubah urutan Komponen</small></p>
                        <p class="mb-0"><small>*Gunakan icon <i class="fa fa-arrows"></i> untuk mengubah posisi Komponen dengan teknik Drag and Drop</small></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form autocomplete="off" method="post" action="/pok/changepos/{{$type}}/id/{{$id}}" class="needs-validation ml-3" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="control-label mb-10 text-left"><strong>Deskripsi RO</strong></label>
                                <blockquote>{{$parent->kode}} {{$parent->deskripsi}}</blockquote>
                            </div>
                            <div class="row container" style="display: flex;">
                                <div class="mr-30">
                                    <strong class="mb-0">Posisi</strong>
                                    <div class="list-group">
                                        @foreach($pokitems as $pokitem)
                                        <div class="list-group-item" style="border: none" draggable="false">
                                            <span><small>{{$loop->iteration}}</small></span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="container">
                                    <strong class="mb-0">Deksripsi Komponen</strong>
                                    <div id="sortablelist" class="list-group">
                                        @foreach($pokitems as $pokitem)
                                        <div class="list-group-item px-0 handle grabbable" style="border: none" draggable="false">
                                            <i class="fa fa-arrows text-danger mr-3"></i>
                                            <span><strong>{{$pokitem->kode}} {{$pokitem->deskripsi}}</strong></span>
                                            <input type="hidden" id="position[]" name="position[]" value="{{$pokitem->kode}}" />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="col">
                                    <button class="btn btn-icon btn-primary mt-3 mb-3 ml-3" type="submit">
                                        <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                                        <span class="btn-inner--text">Simpan Posisi</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('optionaljs')
<script src="/vendors/sortable/Sortable.js"></script>
<script>
    new Sortable(sortablelist, {
        handle: '.handle',
        animation: 150,
        ghostClass: 'blue-background-class'
    });
</script>
@endsection