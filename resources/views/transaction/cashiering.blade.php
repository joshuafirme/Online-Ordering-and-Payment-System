@extends('layouts.transaction')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cashiering
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cashiering</li>
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
                    <div class="box-body table-responsive">

                        <table id="" class="table table-bordered table-hover" style="width: 100%; margin-bottom:20px;">
                            <thead>
                                <tr>
                                    <th colspan="2">Search<input type="text" class="form-control" id="txt_search"></th>
                                    <th colspan="3"><button class="btn btn-sm btn-primary" id="btn-add"><i class="fa fa-plus"></i> Add</button></th>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <input type="hidden" id="id">
                                    <th><input type="number" min="0" class="form-control" value="1" id="qty"></th>
                                    <th><input type="text" class="form-control" readonly id="description"></th>
                                    <th><input type="text" class="form-control" readonly id="category"></th>
                                    <th><input type="text" class="form-control" readonly id="price"></th>
                                    <th><input type="text" class="form-control" readonly id="amount"></th>
                                </tr>
                            </tbody>    
                        </table>

                        <label for="">Tray</label>
                        <table id="tray_table" class="table table-bordered table-hover" style="width: 100%; margin-bottom:20px;">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tray as $data)
                                <tr>
                                    <th>{{ $data->description }}</th>
                                    <th>{{ $data->category }}</th>
                                    <th>{{ $data->price }}</th>
                                    <th>{{ $data->qty }}</th>
                                    <th>{{ $data->amount }}</th>
                                    <th><button id="btn-remove" delete-id="{{$data->id}}" style="color:#AA0000;">&times;</button></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table id="" class="table table-bordered table-hover" style="width: 40%">
                            <thead>
                                <tr>
                                    <th>Total Amount</th>
                                    <th>₱<span id="txt_total_amount">{{ $totalAmount }}</span></th>
                                </tr>
                                <tr>
                                    <th>Tendered</th>
                                    <th><input type="text" class="form-control" id="txt_tendered"></th>
                                </tr>
                                <tr>
                                    <th>Change</th>
                                    <th>₱<span id="txt_change"></span></th>
                                </tr>
                            </thead>
                        </table>
                        <button class="btn btn-sm btn-success" style="margin-top: 10px" id="btn-process">Process</button>
                 
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->



@endsection