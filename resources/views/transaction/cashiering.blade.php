@extends('layouts.transaction')

@section('content')

<style>
    #menu-cont{
        height: 400px;
        width: 1000px;
        overflow-y: scroll;
    }
</style>
   
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

                        <div class="row" id="menu-cont">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                <div class="dif-cate-box">
                  
                                <div class="img-box">
                                <div class="img-cont loading"><img src="../../storage/'+data[i].image+'" class="img loading" alt="" style="height:300px;" ></div>
                                <img src="../../storage/img-placeholder.png" class="img loading" alt="" style="height:300px;">
                                
                                </div>
                                <div style="padding:10px;" class="menu-description">
                                <p class="desc m-0" style="font-family: lavenda, sans-serif; font-size:20px; color: #3B3B3B;">'+data[i].description+'</p>
                                <p class="desc" style="font-family: lavenda, sans-serif; font-size:20px; color: #FFC000;">₱'+data[i].price+'</p>
                                <p class="desc" style="font-family: lavenda, sans-serif; font-size:16px; color: #28A745;">Preparation time: '+data[i].preparation_time+'</p>
                                
                                  <div class="desc-loading4 loading"><button class="btn btn-sm pl-3 pr-3 add_to_cart" style="background-color:#005B96; color:#fff; border-radius:50px;"';
                                  menu-id="'+data[i].id+'" amount="'+data[i].price+'">Add to tray</button></div>
           
                                  <span style="color:#AA0000;">Not available</span>
                                
                                       </div>
                            
                                   </div>
                                </div>
                        </div>

                        <table id="" class="table table-borderless table-hover" style="width: 100%; margin-bottom:20px;">
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
                        <table id="tray_table" class="table table-borderless table-hover" style="width: 100%; margin-bottom:50px;">
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

                       <div class="row">
                        <div class="col-lg-6">
                            <table id="" class="table table-borderless table-hover" style="width: 100%;">
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
    
                                <div class="form-check" style="margin-top:10px;">
                                  <input class="form-check-input" type="radio" name="radio-payment-option" id="radio-cash" value="cash" checked required>
                                  <label class="form-check-label">
                                    Cash
                                  </label>
                                </div>
                                <div class="form-check mt-1 ml-2">
                                  <input class="form-check-input" type="radio" name="radio-payment-option" id="radio-gcash" value="gcash" required>
                                  <label class="form-check-label">
                                    Gcash
                                  </label>
                                </div>
      
                            <button class="btn btn-sm btn-success" style="margin-top: 10px" id="btn-process">Process</button>
                        </div>
                        <div class="col-lg-6 mt-xs-2">
                            <img src="{{ asset('img/qr.png') }}" width="300px;" alt="">
                        </div>
                       </div>

                        
                 
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->



@endsection