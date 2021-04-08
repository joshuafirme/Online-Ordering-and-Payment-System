@include('customer.layouts.header2')

            <div class="container">     
                <section class="content" style="margin-top: 15px;">
                    @if(\Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-circle"></i> </h5>
                    {{ \Session::get('invalid') }}
                    </div>      
                    @endif
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <div class="box box-primary">
                                <h3 class="mb-2">Select payment method</h3>
                                <a href="/gcash-payment" class="btn btn-sm btn-primary" style="width: 200px;">Gcash</a>
                                <a href="/cod" class="btn btn-sm btn-primary" style="width: 200px;">Cash on delivery</a>

                                <p style="margin-top: 40px;">Total Amount to be paid</p>
                                      <h3 class="text-success">₱{{ number_format(\Session::get('TOTAL_CHECKOUT'),2,'.',',') }}</h3>
                            </div>
                        </div>
                    </div>
            
            
                </section>
            </div>

    </div>

</body>