@extends('layouts.transaction')

@section('content')

<style>
          .dif-cate-box { padding: 0; border: 0px solid #e6e6e6; border-radius: 0px; box-shadow: 0px 3px 18px #1672b021; margin-bottom: 35px;}
  .min-ht .dif-cate-box{ min-height: 300px;}
  .dif-cate-box .img-box{padding-left:0; padding-right:0;}
  .dif-cate-box .img-box .img{width: 100%; max-height: 228px; object-fit: cover;}
  .dif-cate-box .disc-wrp{padding: 15px 18px; text-align: center;}
  .dif-cate-box .disc-wrp h4, .fourBlock h4{font-size: 18px; color:#00192b; font-family: 'Poppins', sans-serif; font-weight: 600; margin-bottom: 8px;}
  .dif-cate-box .disc-wrp p, .fourBlock p{color: #666666; font-size: 13px; font-family: 'Poppins', sans-serif; line-height: 19px; margin-bottom:0;}
  .home-signup-btn{font-size:17px; color:#FFF; font-family: 'Poppins', sans-serif;}
  
  .cateTtl h2{font-size:30px; color:#263238; font-family: 'Poppins', sans-serif; margin-bottom: 0;}
  
  .newTtl h2{font-size:30px; color:#263238; font-family: 'Poppins', sans-serif; margin-bottom: 0;}
  
  .whtTtl h2{font-size:30px; color:#fff; font-family: 'Poppins', sans-serif;}
  
  .cateTtl h2 span, .newTtl h2 span, .whtTtl h2 span{font-weight: 600;}
  
  .mb-30 {margin-bottom: 30px;}
  
  @media screen and (max-width: 653px) {
      ul.icon-img-list{padding:0 35px;}
      ul.icon-img-list li {width: 100%; min-width: 100%; margin-left:0px !important; margin-right:0 !important;}
  }
  @media screen and (max-width: 767px) {
      .min-ht .dif-cate-box{min-height: auto;}
  }
  @media only screen and (min-device-width : 992px) and (max-device-width : 1199px) {
      .dif-cate-box{min-height: 318px;}
  }
    #menu-cont{
        height: 480px;
        width: 100%;
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
                            @foreach ($menu as $data)
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="dif-cate-box">
                  
                                    <div class="img-box">
                                        @if ($data->image)
                                            <img src="{{ asset('storage/'.$data->image) }}" class="img loading" alt="" style="height:300px;">
                                        @else
                                            <img src="../../storage/img-placeholder.png" class="img loading" alt="" style="height:300px;">
                                        @endif
                                        
                                    </div>
                                    <div style="padding:10px;" class="menu-description">
                                        <p class="desc m-0" style="font-family: lavenda, sans-serif; font-size:20px; color: #3B3B3B;">{{$data->description}}</p>
                                        <p class="desc" style="font-family: lavenda, sans-serif; font-size:20px; color: #FFC000;">₱{{$data->price}}</p>
                                        <p class="desc" style="font-family: lavenda, sans-serif; font-size:20px;">Available qty: {{$data->qty}}</p>
                                        <p class="desc" style="font-family: lavenda, sans-serif; font-size:16px; color: #28A745;">Preparation time: {{$data->preparation_time}}</p>
                                        
                                        @if ($data->status=='Available')
                                            <button class="btn btn-sm pl-3 pr-3 btn-add" style="background-color:#005B96; color:#fff; border-radius:50px;"
                                            menu-id="{{$data->id}}" price="{{$data->price}}">Add to tray</button>
                                            <span style=" margin-left:15px;">Qty:<input id="menu{{$data->id}}" type="number" style="width: 50px;" min="1" value="1"></span>
                                        @else
                                        <button class="btn btn-sm pl-3 pr-3 btn-add" style="background-color:#fff; color:#AA0000; border-radius:50px;"
                                        disabled>Not available</button> 
                                        @endif
   
                                    </div>
                                
                                </div>
                            </div>
                            @endforeach
                            
                        </div>

                        <hr>

                        {{--<table id="" class="table table-borderless table-hover" style="width: 100%; margin-bottom:20px;">
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
                        </table>--}}

                        <h3>Tray</h3>
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
                                    <th><button class="btn-remove" delete-id="{{$data->id}}" style="color:#AA0000;">&times;</button></th>
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