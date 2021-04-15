@include('customer.layouts.header2')

            <div class="container">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row">
          
                            <div class="col-sm-12" style="margin-top:20px;" align="center">
                                
                            @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check-circle"></i> </h5>
                              {{ \Session::get('success') }}
                            </div>      
                            @endif
                                <div class="card-block">
       
                                    <div class="alert alert-success" role="alert">
                                        <p class="text-center m-0">Order Recieved</p>
                                        <p class="text-center m-0">Please have this amount ready on delivery</p>
                                        <h4 class="text-success text-center">₱{{ Helper::getPaymentTotalAmount() }}</h4>
                                        <p class="text-center">Back to <a href="{{ url('/') }}">homepage</a></p>
                                      </div>
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>

</body>