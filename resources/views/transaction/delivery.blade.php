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
                    <div class="box-body table-responsive">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">
                              <a class="nav-link  active show" id="pending-tab" data-toggle="tab" href="#pending_tab" role="tab" aria-controls="contact" aria-selected="true">Pending</a>
                            </li>
            
                            <li class="nav-item">
                              <a class="nav-link" id="processing-tab" data-toggle="tab" href="#processing_tab" role="tab" aria-controls="contact" aria-selected="true">Preparing
                              </a>
                            </li>
            
                            <li class="nav-item">
                              <a class="nav-link" id="dispatch-tab" data-toggle="tab" href="#dispatch_tab" role="tab" aria-controls="contact" aria-selected="true">Dispatch
                              </a>
                            </li>
            
                            <li class="nav-item">
                              <a class="nav-link" id="delivered-tab" data-toggle="tab" href="#delivered_tab" role="tab" aria-controls="contact" aria-selected="true">Delivered
                              </a>
                            </li>
            
                            <li class="nav-item">
                              <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled_tab" role="tab" aria-controls="contact" aria-selected="true">Cancelled order
                              </a>
                            </li>
             
                          </ul>   
            
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="pending_tab" role="tabpanel" aria-labelledby="pending-tab">
            
                                    <table class="table responsive table-hover" id="pending-table" width="100%">                               
                                      <thead>
                                        <tr>
            
                                          <th>Order #</th>
                                          <th>Customer Name</th>                                                           
                                          <th>Phone No</th>        
                                          <th>Email</th>
                                          <th>Date time placed</th>
                                          <th>Action</th>
                                        
                                        </tr>
                                      </thead>
                                    </table>
            
                            </div>
            
                              <div class="tab-pane fade" id="processing_tab" role="tabpanel" aria-labelledby="processing-tab">
            
                                <table class="table responsive table-hover" id="processing-table" width="100%">                               
                                  <thead>
                                    <tr>
            
                                      <th>Order #</th>
                                      <th>Customer Name</th>                                                           
                                      <th>Phone No</th>        
                                      <th>Email</th>
                                      <th>Payment method</th>
                                      <th>Date placed</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    
                                    </tr>
                                  </thead>
                                </table>
            
                              </div>
            
            
                              <div class="tab-pane fade" id="dispatch_tab" role="tabpanel" aria-labelledby="dispatch-tab">
            
                                <table class="table responsive table-hover" id="dispatch-table" width="100%">                               
                                  <thead>
                                    <tr>
            
                                      <th><input type="checkbox" name="select_all" value="1" id="select-all-delivered"></th>
                                      <th>Order #</th>
                                      <th>Customer Name</th>                                                           
                                      <th>Phone No</th>        
                                      <th>Email</th>
                                      <th>Payment method</th>
                                      <th>Date placed</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    
                                    </tr>
                                  </thead>
                                </table>
            
                                <img class="ml-2" src="{{asset('assets/arrow_ltr.png')}}" alt="">
                                <button class="btn btn-sm btn-success mt-2" id="btn-bulk-delivered">Delivered</button>
                                <img src="../../assets/loader.gif" class="loader" alt="loader" style="display: none">
            
                              </div>
            
                              <div class="tab-pane fade" id="delivered_tab" role="tabpanel" aria-labelledby="delivered-tab">
            
                                <div class="row">
            
                                  <div class="mt-2 ml-3">
                                     Date Delivered
                                    </div>              
                                  
                                  <div class="col-sm-2 mb-3">
                                    <input data-column="9" type="date" class="form-control" name="date_from" id="del_date_from" value="{{ date('Y-m-d') }}">
                                    </div>
                  
                                    <div class="mt-2">
                                      -
                                      </div>
                        
                                    <div class="col-sm-2 mb-3">
                                      <input data-column="9" type="date" class="form-control" name="date_to" id="del_date_to" value="{{ date('Y-m-d') }}">
                                      </div>                 
            
                                 </div>
            
                                <table class="table responsive table-hover" id="delivered-table" width="100%">                               
                                  <thead>
                                    <tr>
            
                                      <th>Order #</th>
                                      <th>Customer Name</th>                                                           
                                      <th>Phone No</th>        
                                      <th>Email</th>
                                      <th>Payment method</th>
                                      <th>Date placed</th>
                                      <th>Date delivered</th>
                                      <th>Status</th>
                                    
                                    </tr>
                                  </thead>
                                </table>
            
                              </div>
            
                              <div class="tab-pane fade" id="cancelled_tab" role="tabpanel" aria-labelledby="cancelled-tab">
            
                                <div class="row">
            
                                  <div class="mt-2 ml-3">
                                     Date Cancelled
                                    </div>              
                                  
                                  <div class="col-sm-2 mb-3">
                                    <input data-column="9" type="date" class="form-control" name="date_from" id="cancelled_date_from" value="{{ date('Y-m-d') }}">
                                    </div>
                  
                                    <div class="mt-2">
                                      -
                                      </div>
                        
                                    <div class="col-sm-2 mb-3">
                                      <input data-column="9" type="date" class="form-control" name="date_to" id="cancelled_date_to" value="{{ date('Y-m-d') }}">
                                      </div>                 
            
                                 </div>
                                 
                                <table class="table responsive table-hover" id="cancelled-table" width="100%">                               
                                  <thead>
                                    <tr>
            
                                      <th>Order #</th>
                                      <th>Customer Name</th>                                                           
                                      <th>Phone No</th>        
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Date placed</th>
                                        <th>Date placed</th>
                                    
                                    </tr>
                                  </thead>
                                </table>
            
                              </div>
            
                            </div>
                        
                 
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->

      <!--Confirm Delete Modal-->
  <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure do you want to cancel this order?</p>
        </div>
        <div class="modal-footer">
        <button class="btn btn-sm btn-outline-dark" id="btn-yes">Yes</button>
        <button class="btn btn-sm btn-danger cancel-delete" data-dismiss="modal">Cancel</button>

        </div>
      </div>
    </div>
  </div>


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

                  <div class="col-md-12">

                        <table class="table responsive table-striped table-hover mt-2" id="order-table">                               
                            <thead>
                              <tr>
                                  <th>Description</th>
                                  <th>Category</th>
                                  <th>Image</th>
                                  <th>Preparation Time</th> 
                                  <th>Price</th>
                                  <th>Amount</th>  
                               
                              </tr>
                            </thead>
              
                              <tbody>
                                  <tr>
                              
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>₱</td>
                                      <td>₱</td>
                                      
                                  </tr>  
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>Subtotal:</td>
                                      <td>
                                        ₱ 
                                      </td>   
                                   </tr> 

                                   <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Shipping Fee:</td>
                                    <td>
                                      ₱ <span id="txt_shipping_fee"></span>
                                    </td>   
                                 </tr> 
                                 <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Total Amount:</td>
                                  <td>
                                    <b>₱ <span id="txt_total_amount"></span></b>
                                  </td>   
                               </tr> 
                              </tbody>
                              
                          </thead>
                          
                          </table>

                  </div>

                    
                    <div class="col-md-12 mb-2"><hr></div>

                    <div class="col-md-12 mb-2">
                        <h4>Customer Information</h4>
                        <span class="badge badge-success" id="verification-info"></span>
                    </div>
                    
                    <input type="hidden" id="order-no">
                    <input type="hidden" id="user-id">
    
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
          
                  </div>

      
        </div>
  
        <div class="modal-footer">
          <div class="update-success-validation mr-auto ml-3" style="display: none">
            <label class="label text-success">Items packed successfully</label>    
          </div> 
          <button class="btn btn-outline-dark btn-sm" id="btn-gen-sales-inv"><span class='fa fa-print'></span> Generate Sales Invoice</button> 
          <button style="color: #fff" class="btn btn-sm btn-success" id="btn-process">Pack items</button>
       
        </div>
  
      </div>
    </div>
  </div>

@endsection
