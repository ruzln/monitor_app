@extends('master.main')
@section('content')

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="col-md-6">                                     
                   <h6 class="panel-title txt-dark">Penerimaan PBB  : {{ Carbon\Carbon::now()->isoFormat("dddd, D MMMM Y") }} </h6>
                </div>
                <div class="col-md-4 pull-right">@foreach ( $totalbayar as $t ) 
                   <h5 style="text-align: right">Total Hari Ini : @currency ($t->total_hari_ini) </h5>
                     @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table style="width: 99%"  id="datable_1" class="table table-striped table-hover table-bordered display  pb-30" >
                                <thead class="bg-grad-danger">                                   
                                    <tr>
                                        <th  class="text-center txt-light "style="max-width: 10px">NO</th>
                                        <th  class="text-center txt-light ">NOP</th>
                                        <th  class="text-center txt-light ">NAMA WP</th>
                                        <th  class="text-center txt-light ">KELURAHAN</th>
                                        <th  class="text-center txt-light ">TAHUN PAJAK</th>
                                        <th  class="text-center txt-light ">DENDA</th>
                                        <th  class="text-center txt-light ">TOTAL BAYAR</th>
                                        <th  class="text-center txt-light ">TGL BAYAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                        @foreach($result as $p)
                                            <tr>
                                            <td class="text-center">{{ $no++ }} </td>
                                            <td class="text-center">{{ $p->kd_propinsi }}.{{ $p->kd_kecamatan }}.{{ $p->kd_kelurahan }}.{{ $p->kd_blok }}.{{ $p->no_urut }}.{{ $p->kd_jns_op }}</td>
                                            <td>{{ $p->nm_wp_sppt }}</td>
                                            <td>{{ $p->nm_kelurahan }}</td>
                                            <td class="text-center">{{ $p->thn_pajak_sppt }}</td>
                                            <td class="text-right">@currency ($p->denda_sppt)</td>
                                            <td class="text-right">@currency ($p->jml_sppt_yg_dibayar)</td>
                                            <td>{{ date('d-m-Y', strtotime( $p->tgl_pembayaran_sppt)) }}
                                                {{-- {{ $p->tgl_pembayaran_sppt->Format("dddd, D MMMM Y") }} --}}
                                            </td>
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