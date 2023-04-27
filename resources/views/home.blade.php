@extends('master.main')
@section('content')

<div class="row">
    <div class="col-sm-12">
    <div class="row">
        {{-- Card Jumlah SPPT --}}
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                                                                         
                                    <div class="col-xs-9 data-wrap-left">
                                        <span class="capitalize-font block">Jumlah SPPT</span>
                                        <span class="txt-dark block"><span class="counter inline-block"><span class="counter-anim">
                                            
                                            @foreach ($result as $p) 

                                            @if(!empty($p->jumlah_sppt))
                                            {{ $p->jumlah_sppt }}                                    
                                            @else 
                                            {{ 0 }}
                                            @endif
                                        </span></span></span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-storage data-right-rep-icon bg-grad-sunset"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-success 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Card Target PBB --}}
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-9 data-wrap-left">
                                        <span class="capitalize-font block">Target PBB</span>
                                            <span class="txt-dark block">
                                                <span class="counter inline-block">
                                                    @if(!empty($p->jumlah_sppt))
                                                    @currency($p->target )                                    
                                                    @else 
                                                    {{ 0 }}
                                                    @endif
                                              {{-- @currency($p->target ) --}}
                                                </span>
                                            </span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-trending-up data-right-rep-icon bg-grad-warning"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-warning 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="
                                        @if(!empty($p->realisasi_pokok))
                                        {{ $p->realisasi_pokok/$p->target*100 }}" aria-valuemin="0" aria-valuemax="{{ $p->target }}
                                        @else 
                                        {{ 0 }}
                                        @endif">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         {{-- Card Realisasi PBB --}}
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-9 data-wrap-left">
                                        <span class="capitalize-font block">Realisasi</span>
                                        <span class="txt-dark block">
                                            <span class="counter inline-block">
                                                @if(!empty($p->jumlah_sppt))
                                                @currency($p->realisasi_total)                                    
                                                    @else 
                                                    {{ 0 }}
                                                    @endif                                                                                              
                                                {{-- @currency($p->realisasi_total) --}}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-assignment-check data-right-rep-icon bg-grad-info"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-primary 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="
                                        @if(!empty($p->realisasi_pokok))
                                        {{ $p->realisasi_pokok/$p->target*100 }}" aria-valuemin="0" aria-valuemax="{{ $p->target }}
                                        @else 
                                        {{ 0 }}
                                        @endif
                                        "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Card Persentase Realisasi --}}
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-9 data-wrap-left">
                                        <span class="capitalize-font block">Persentase</span>
                                            <span class="txt-dark block">
                                                <span class="counter inline-block">
                                                    @if(!empty($p->jumlah_sppt))
                                                    @persen($p->realisasi_pokok/$p->target*100) %                                    
                                                        @else 
                                                        {{ 0 }}
                                                        @endif 
                                                    {{-- @persen($p->realisasi_pokok/$p->target*100) %  --}}
                                                </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-lamp data-right-rep-icon bg-grad-danger"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-danger 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="
                                        @if(!empty($p->jumlah_sppt))
                                        {{ $p->realisasi_pokok/$p->target*100 }}
                                        " 
                                        aria-valuemin="0" aria-valuemax="
                                        {{ $p->target }}
                                        @else 
                                        {{ 0 }}
                                        @endif
                                        "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- Card Piutang --}}
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default border-panel card-view panel-refresh">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Penerimaan Piutang</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <a href="#" class="pull-left inline-block full-screen mr-15">
                            <i class="zmdi zmdi-fullscreen"></i>
                        </a>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row pa-0">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
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
                                    <tbody>
                                        <tr>
                                           <td> @foreach ($pjanuari as $item)@currency ($item->pjan )@endforeach </td> 
                                           <td> @foreach ($pfebruari as $item)@currency ($item->pfeb )@endforeach </td> 
                                           <td> @foreach ($pmaret as $item)@currency ($item->pmar )@endforeach </td> 
                                           <td> @foreach ($papril as $item)@currency ($item->papr )@endforeach </td> 
                                           <td> @foreach ($pmei as $item)@currency ($item->pmei )@endforeach </td> 
                                           <td> @foreach ($pjuni as $item)@currency ($item->pjun )@endforeach </td> 
                                           <td> @foreach ($pjuli as $item)@currency ($item->pjul )@endforeach </td> 
                                           <td> @foreach ($pagustus as $item)@currency ($item->pags )@endforeach </td> 
                                           <td> @foreach ($pseptember as $item)@currency ($item->psep )@endforeach </td> 
                                           <td> @foreach ($poktober as $item)@currency ($item->pokt )@endforeach </td> 
                                           <td> @foreach ($pnovember as $item)@currency ($item->pnov )@endforeach </td> 
                                           <td> @foreach ($pdesember as $item)@currency ($item->pdes )@endforeach </td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>	
                    </div>	
                </div>
            </div>
        </div>
{{-- Card Tahun Berjalan --}}
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default border-panel card-view panel-refresh">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Penerimaan Tahun Berjalan</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <a href="#" class="pull-left inline-block full-screen mr-15">
                            <i class="zmdi zmdi-fullscreen"></i>
                        </a>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row pa-0">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
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
                                    <tbody>
                                        <tr>
                                           <td> @foreach ($januari as $item)@currency ($item->jan )@endforeach </td> 
                                           <td> @foreach ($februari as $item)@currency ($item->feb )@endforeach </td> 
                                           <td> @foreach ($maret as $item)@currency ($item->mar )@endforeach </td> 
                                           <td> @foreach ($april as $item)@currency ($item->apr )@endforeach </td> 
                                           <td> @foreach ($mei as $item)@currency ($item->mei )@endforeach </td> 
                                           <td> @foreach ($juni as $item)@currency ($item->jun )@endforeach </td> 
                                           <td> @foreach ($juli as $item)@currency ($item->jul )@endforeach </td> 
                                           <td> @foreach ($agustus as $item)@currency ($item->ags )@endforeach </td> 
                                           <td> @foreach ($september as $item)@currency ($item->sep )@endforeach </td> 
                                           <td> @foreach ($oktober as $item)@currency ($item->okt )@endforeach </td> 
                                           <td> @foreach ($november as $item)@currency ($item->nov )@endforeach </td> 
                                           <td> @foreach ($desember as $item)@currency ($item->des )@endforeach </td> 
                                        </tr>
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
    </div>
    @endforeach
@endsection