@extends('master.main')
@section('content')
				
    <!-- Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Form with icon</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ route('report.date') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Range date tgl bayar</label>
                                                
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form-control" name="start_date">
                                                            <input type="date" class="form-control" name="end_date">
                                                        </div>                                                    
                                                </div>
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
                    
@endsection