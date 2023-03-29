@extends('master.main')
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="col-md-5">  
                    {{-- <h6 class="panel-title txt-dark">Rekap Penerimaan : {{ $start }} s/d {{ $end }}</h6> --}}
                </div>
                <div class="col-md-4.5 pull-right">
                    
					{{-- <form action="{{ route('range') }}" method="POST">  --}}
						<form  action="/range" method="GET">
							<label class="panel-title txt-dark pt-2">Tanggal Bayar : </label>
								<input style="height: 28px; border-radius:3px;border-bottom-width: 1px;border-color: aqua; border-width: thin" type="date"  class="form-group date" name="start_date" not null>
								<input style="height: 28px; border-radius:3px;border-bottom-width: 1px;border-color: aqua; border-width: thin" type="date"  class="form-group date"  name="end_date" not null>
							<div class="form-group row">
								<label class="col-md-4">Kecamatan</label>
								<div class="col-md-7">
									<select name="kecamatan" id="kecamatan_pendaftaran"
										class="custom-select custom-select-sm">
										<option value="">Pilih</option>
										@foreach ($kec as $item)
											<option value="{{ $item->kd_kecamatan }}">{{ $item->nm_kecamatan }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<button style="border-radius: 4px" class="btn btn-default btn-xs"><strong>Submit</strong></button>
                    	</form>
                	</div>
                <div class="clearfix"></div>
            </div>
		<br>
			<div class="panel-wrapper collapse in">
				<div class="panel-body pt-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="example" class="table table-hover display  pb-30" >
								<thead class="bg-grad-danger">
									<tr>
										<th>No</th>
										<th>NOP</th>
										<th>Nama Wajib Pajak</th>
										<th>ALamat </th>
										<th>Letak Objek</th>
										<th>Bumi</th>
										<th>Bangunan</th>
										<th>Pokok PBB</th>
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
										<td>{{ $item->jalan_op }}</td>
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