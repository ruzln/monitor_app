@extends('master.main')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">realisasi s/d : {{ Carbon\Carbon::now()->isoFormat("dddd, D MMMM Y") }}</h6>
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
                                        <th  class="text-center txt-light" style="max-width: 10px">NO</th>
                                        <th  class="text-center txt-light">KECAMATAN</th>
                                        <th  class="text-center txt-light">TARGET PBB</th>
                                        <th  class="text-center txt-light">REALISASI POKOK</th>
                                        <th  class="text-center txt-light">DENDA</th>
                                        <th  class="text-center txt-light">TOTAL BAYAR</th>
                                        <th  class="text-center txt-light">PERSENTASE </th>
                                        <th  class="text-center txt-light">SISA TAGIHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($hasil as $p)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $p->nm_kecamatan }} </td> 
                                        <td class="text-right"> @currency($p->target)</td> 
                                        <td class="text-right"> @currency($p->realisasi_pokok)</td>                           
                                        <td class="text-right"> @currency($p->total_denda ) </td>
                                        <td class="text-right"> @currency($p->realisasi_total)</td>
                                        <td class="text-center"> @persen($p->realisasi_pokok/$p->target*100) %</td>
                                        <td class="text-right"> @currency($p->realisasi_pokok-$p->target)  </td>
                                                                                       
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