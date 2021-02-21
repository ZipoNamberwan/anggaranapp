@extends('layout.main')

@section('container')

<div class="container">
				
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Data table</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.html">Dashboard</a></li>
				<li><a href="#"><span>table</span></a></li>
				<li class="active"><span>data-table</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>

	<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default border-panel card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">data Table</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Kode Program</th>
														<th>Kode Aktivitas</th>
														<th>Kode KRO</th>
														<th>Kode RO</th>
														<th>Kode Komponen</th>
														<th>Kode Sub Komponen</th>
														<th>Kode Detil</th>
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
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Kode Program</th>
														<th>Kode Aktivitas</th>
														<th>Kode KRO</th>
														<th>Kode RO</th>
														<th>Kode Komponen</th>
														<th>Kode Sub Komponen</th>
														<th>Kode Detil</th>
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
													</tr>
												</tfoot>
												<tbody>
													@foreach($detils as $detil)
													<tr>
														<td>{{$detil->kode}}</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>
														<td>100</td>

													</tr>
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