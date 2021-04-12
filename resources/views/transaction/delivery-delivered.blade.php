@extends('layouts.transaction')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Delivery
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Delivery</li>
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
                        
                        <div style="margin-top: 5px;">
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="date_from" value="{{ date('Y-m-d') }}">
                            </div>
                            
                            <div class="col-sm-2">
                            <input type="date" class="form-control" id="date_to" value="{{ date('Y-m-d') }}">
                            </div> 

                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">

                      <h3 style="margin-bottom: 20px;">Delivered</h3>
                      
                      <table class="table responsive table-hover" id="delivered-table" width="100%">                               
                        <thead>
                          <tr>

                            <th>Order #</th>
                            <th>Customer Name</th>                                                           
                            <th>Phone No</th>        
                            <th>Email</th>
                            <th>Date time placed</th>
                            <th>Date time delivered</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                     
                        
                 
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->


  <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 1000px;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title-order-no"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                
          <div class="row">
            <div class="col-md-12 mb-2">
              <h4>Customer Information</h4>
              <span class="badge badge-success" id="verification-info"></span>
          </div>

          <div class="col-md-4">
              <label class="label-small" >Full Name</label>
              <p id="fullname"></p>
          </div>

          <div class="col-md-4">
              <label class="label-small">Email Address</label>
              <p  id="email"></p>
          </div>

          <div class="col-md-4">
              <label class="label-small">Phone Number</label>
              <p  id="phone-no"></p>
          </div> 

          <div class="col-md-12 mb-2"><hr></div>



          <div class="col-md-12 mb-2">
              <h4>Shipping Address</h4>
          </div>

          <div class="col-md-4">
            <label class="label-small">Municipality</label>
            <p id="municipality"></p>
          </div> 

          <div class="col-md-4">
            <label class="label-small">Barangay</label>
            <p id="brgy"></p>
          </div> 

          <div class="col-md-4 mb-3">
              <label class="label-small">House/Unit/Flr #, Bldg Name, Blk or Lot #</label>
              <p id="flr-bldg-blk"></p>
          </div> 

          <div class="col-md-4">
              <label class="label-small">Nearest landmark</label>
              <p id="note"></p>
          </div> 

          <div class="col-md-12 mb-2"><hr></div>

          <div class="col-md-12 mb-2">
            <h4>Order #<span id="order-number"></span></h4>
        </div>

                  <div class="col-md-12">

                        <table class="table responsive table-striped table-hover mt-2" id="order-table">
                          {{-- populate by ajax --}}
                        </table>

                  </div>

          
                  </div>

      
        </div>
  
        <div class="modal-footer">        
            <input type="hidden" name="order-no">
            <input type="hidden" name="user-id">
          {{--<button class="btn btn-outline-dark btn-sm" id="btn-gen-sales-inv"><span class='fa fa-print'></span> Generate Sales Invoice</button> --}}
       
        </div>
  
      </div>
    </div>
  </div>

@endsection
