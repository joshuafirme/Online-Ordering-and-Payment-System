@extends('layouts.reports')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reports
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Gross Sale</li>
        </ol>
    </section>

    @if(\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fa fa-check-circle"></i> </h5>
      {{ \Session::get('success') }}
    </div>      
    @endif

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Gross Sale</h3>   
                        
                        <div style="margin-top: 5px;">
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="date_from" value="{{ date('Y-m-d') }}">
                            </div>
                
                            <div class="col-sm-2">
                            <input type="date" class="form-control" id="date_to" value="{{ date('Y-m-d') }}">
                            </div> 

                            <div class="col-sm-2">
                                Total Sales: <span id="total-sales" style="font-size: 20px;"></span>
                            </div>
                            <div class="col-sm-2">
                                <button id="btn-compute-sales" class="btn btn-sm btn-success">Compute Sales</button>
                                <button class="btn btn-sm btn-secondary" id="btn-print-sales">Print</button>
                            </div> 
                        </div>

                    </div><!-- /.box-header -->
                    
            
                    
                    <div class="box-body table-responsive">
                        <table id="gross-sale-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Trans ID</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    <th>Payment method</th>
                                    <th>Order Type</th>
                                    <th>Date time</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->


@endsection