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
                                        <h4 class="text-center m-0">Your payment of ₱<b>{{ number_format(\Session::get('TOTAL_CHECKOUT'),2,'.',',') }}</b>
                                            was successfully paid! Order is being processed...</h4>
                                        <p class="text-center">Continue <a href="{{ url('/') }}">homepage</a></p>
                                      </div>
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

</body>