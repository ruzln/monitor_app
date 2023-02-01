@extends('master.main')
@section('content')

<div class="row">
    <div class="col-sm-12">
    <div class="row">
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
                                            @foreach ($result as $p)     {{ $p->jumlah_sppt }} 
                                        </span></span></span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-storage data-right-rep-icon bg-grad-info"></i>
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
                                              @currency($p->target )
                                                </span>
                                            </span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-trending-up data-right-rep-icon bg-grad-info"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-success 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="{{ $p->realisasi_pokok/$p->target*100 }}" aria-valuemin="0" aria-valuemax="{{ $p->target }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
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
                                                @currency($p->realisasi_total)
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="zmdi zmdi-assignment-check data-right-rep-icon bg-grad-info"></i>
                                    </div>
                                </div>
                                <div class="progress-anim">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-grad-success 
                                        wow animated progress-animated" role="progressbar" aria-valuenow="{{ $p->realisasi_pokok/$p->target*100 }}" aria-valuemin="0" aria-valuemax="{{ $p->target }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
                                                    @persen($p->realisasi_pokok/$p->target*100) % 
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
                                        wow animated progress-animated" role="progressbar" aria-valuenow="{{ $p->realisasi_pokok/$p->target*100 }}" aria-valuemin="0" aria-valuemax="{{ $p->target }}"></div>
                                    </div>
                                </div>
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