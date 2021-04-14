@extends('layouts.reports')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Identity Verification
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Identity Verification</li>
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
                        <h4>For validation</h4>

                        <table id="identity-verification-table" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Fullname</th>   
                                    <th>Phone Number</th>   
                                    <th>Email</th>   
                                    <th>ID Type</th>   
                                    <th>ID Number</th>        
                                    <th>Status</th>   
                                    <th>Action</th> 
                                </tr>
                            </thead>
                        </table>
                    

                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->

    <div class="modal fade" id="uploadDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Identity Verification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ action('IdentityVerificationCtr@approve') }}" method="POST">
              @csrf
            
            <div class="row">
    
              <input type="hidden" name="user_id" id="user_id">
    
                <div class="col-md-6">
                    <label class="label-small text-muted" >ID Type</label>
                    <p id="id-type"></p>
                </div>
                
                <div class="col-md-6">
                    <label class="label-small text-muted" >ID Number</label>
                    <p id="id-number"></p>
                </div>
    
                <div class="col-md-12 m-auto">
                    <img class="responsive" id="img-valid-id" 
                    style="border-style: dashed; border-color: #9E9E9E; background: #fff; width:100%;">
                  </div>
    
            </div>
        
      
          </div>
          <div class="modal-footer"> 
            <button id="btn-decline" class="btn btn-sm btn-danger">Decline</button>
            <button id="btn-approve" class="btn btn-sm btn-success">Approve</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    
    
@endsection