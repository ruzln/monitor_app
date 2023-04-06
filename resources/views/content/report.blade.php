@extends('master.main')
@section('content')
<!-- Row -->
{{-- <div class="row">
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
</div> --}}

					<!-- Row -->
					<div class="row">
						{{-- Filter realisasi --}}
						<div class="col-md-6">
							<div class="panel panel-default border-panel card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Filter Realisasi</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="{{ route('cari_realisasi') }}" method="GET">
														<div class="form-group ">
															<label class="control-label mb-10" for="exampleInputuname_1">Tanggal Pembayaran</label>
															<div class="input-group col-md-12">																
																	<input type="date" name="start_date" class="form-control id="exampleInputuname_1" >
																<div class="input-group-addon "><i class="">s/d</i></div>
															   		<input type="date" name="end_date" class="form-control" id="exampleInputuname_1" >
															</div>															
														</div>
														
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Kecamatan</label>
															<div class="input-group col-md-12">
																<select  name="kecamatan" class="form-control col-md-6 " data-style="form-control btn-default btn-outline">
																	<option value="">Pilih</option>
																	@foreach ($kec as $item)
																		<option value="{{ $item->kd_kecamatan }}">{{ $item->nm_kecamatan }}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Tahun Pajak</label>
															<div class="input-group col-md-12">
																{{-- waiting --}}
																<?php
																	$now=date('Y');
																	echo "<select class='form-control col-md-3' data-style='form-control btn-default btn-outline' name='tahun_awal'>";
																		echo "<option value=''>Tahun Awal</option>";
																		for ($a=2018;$a<=$now;$a++)
																		{																		
																		echo "<option value='$a'>$a</option>";
																	}
																	echo "</select>";
																?>
																<div class="input-group-addon "><i class="">s/d</i></div>
																<?php
																$now=date('Y');
																echo "<select class='form-control col-md-3' data-style='form-control btn-default btn-outline' name='tahun_akhir'>";
																	echo "<option value=''>Tahun Akhir</option>";
																	for ($a=2018;$a<=$now;$a++)
																	{																		
																	echo "<option value='$a'>$a</option>";
																}
																echo "</select>";
															?>
															</div>
														</div>


														<button type="submit" class="btn btn-success mr-10">Submit</button>
													
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- Filter Tunggakan --}}
						<div class="col-md-6">
							<div class="panel panel-default border-panel card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Filter Tunggakan</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="{{ route('cari_tunggakan') }}" method="GET">												
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Kecamatan</label>
															<div class="input-group col-md-12">
																<select  name="kecamatanop" class="form-control col-md-6 " data-style="form-control btn-default btn-outline">
																	<option value="">Pilih</option>
																	@foreach ($kec as $item)
																		<option value="{{ $item->kd_kecamatan }}">{{ $item->nm_kecamatan }}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Tahun Pajak</label>
															<div class="input-group col-md-12">
																{{-- waiting --}}
																<?php
																	$now=date('Y');
																	echo "<select class='form-control col-md-3' data-style='form-control btn-default btn-outline' name='tahunpajak_awal'>";
																		echo "<option value=''>Tahun Awal</option>";
																		for ($a=2018;$a<=$now;$a++)
																		{																		
																		echo "<option value='$a'>$a</option>";
																	}
																	echo "</select>";
																?>
																<div class="input-group-addon "><i class="">s/d</i></div>
																<?php
																$now=date('Y');
																echo "<select class='form-control col-md-3' data-style='form-control btn-default btn-outline' name='tahunpajak_akhir'>";
																	echo "<option value=''>Tahun Akhir</option>";
																	for ($a=2018;$a<=$now;$a++)
																	{																		
																	echo "<option value='$a'>$a</option>";
																}
																echo "</select>";
															?>
															</div>
														</div>


														<button type="submit" class="btn btn-success mr-10">Submit</button>
													
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- /Row -->
<!-- /Row -->  
@endsection