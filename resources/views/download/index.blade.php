@extends('layout.main2')

@section('stylesheet')
<link rel="stylesheet" href="/vendors/jstree/dist/themes/default/style.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/af-2.3.5/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css" />
<link rel="stylesheet" href="/style.css" />

@endsection

@section('container')

<!-- container -->
<div class="row heading-bg">
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="/downloadpok">Unduh POK</a></li>
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
                    <h2 class="panel-title txt-dark">Unduh POK</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <form id="form-add" action="/downloadpok" method="POST" class="mr-10">
                        @csrf
                        <p>Tekan tombol di bawah ini untuk unduh POK beserta data RPD dan LDS</p>
                        <button class="btn btn-primary btn-icon left-icon mt-20" id="add-button" type="submit"><i class="fa fa-download"></i>Unduh POK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('optionaljs')

@endsection