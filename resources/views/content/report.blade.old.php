@extends('master.main')
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="col-md-4">  
                    <h6 class="panel-title txt-dark">Laporan</h6>
                </div>
                <div class="col-md-6 pull-right">
                    
					<form action="{{ route('cari') }}" method="GET">                                                   
                                    <label >Range date tgl bayar</label>                                
                                        
                                            <input type="date"  name="start_date">
                                            <input type="date"  name="end_date">
                                                                                                                                                                                 
                        <button type="submit" class="btn btn-success mr-10">Submit</button>
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
										<td>#</td>
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