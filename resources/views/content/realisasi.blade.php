@extends('master.main_real')
@section('report')
<!-- Row -->


<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group mb-0">
											<label class="control-label mb-10 text-left">Date Range Pick</label>
											<input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2016 - 01/31/2016"/>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group mb-0">
											<label class="control-label mb-10 text-left">Date Range With Time</label>
											<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2016 1:30 PM - 01/01/2016 2:00 PM"/>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group mb-0">
											<label class="control-label mb-10 text-left">Limit Selectable Dates</label>
											<input class="form-control input-limit-datepicker" type="text" name="daterange" value="06/01/2016 - 06/07/2016"/>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="panel-wrapper collapse in">
				<div class="panel-body pt-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="example" class="table table-hover display  pb-30">
								<thead class="bg-grad-danger">
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">NOP</th>
										<th class="text-center">Nama Wajib Pajak</th>
										<th class="text-center">ALamat </th>
										<th class="text-center">Letak Objek</th>
										<th class="text-center">Bumi</th>
										<th class="text-center">Bangunan</th>
										<th class="text-center">PBB</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1 ?>
									@foreach ($result as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $item->kd_propinsi }}.{{ $item->kd_dati2}}.{{ $item->kd_kecamatan}}.{{$item->kd_kelurahan  }}.{{$item->kd_blok  }}.{{$item->no_urut}}.{{$item->kd_jns_op}}</td>
										<td>{{ $item->nm_wp_sppt  }}</td>
										<td>{{ $item->jln_wp_sppt  }}</td>
										<td>{{ $item->jalan_op  }}</td>
										<td>{{ $item->luas_bumi_sppt  }}&nbsp;m²</td>
										<td>{{ $item->luas_bng_sppt  }}&nbsp;m²</td>
										<td>@currency( $item->pbb_yg_harus_dibayar_sppt )</td>
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
<!-- /Row -->
@endsection