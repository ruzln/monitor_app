@extends('master.main')
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-sm-16">
		
			<div class="panel-wrapper collapse in">
				<div class="panel-body pt-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-hover table-bordered display  pb-30">
								<thead class="bg-grad-danger">
									<tr>
										<th>No</th>
										<th>NOP</th>
										<th>Nama Wajib Pajak</th>
										<th>ALamat </th>
										<th>Letak Objek</th>
										<th>Bumi</th>
										<th>Bangunan</th>
										<th>PBB</th>
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
										<td>{{ $item->luas_bumi_sppt  }} &nbsp;m²</td>
										<td>{{ $item->luas_bng_sppt  }} m²</td>
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
<!-- /Row -->
@endsection