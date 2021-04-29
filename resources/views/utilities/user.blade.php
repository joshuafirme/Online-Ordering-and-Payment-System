@extends('layouts.utilities')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Maintenance
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Maintenance</li>
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
            <div class="col-md-2" style="margin-bottom: 10px;">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal" id="btn-add"><span class='fa fa-plus'></span> Add User</button> 
             </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">                                  
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="user-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Contact Number</th>
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

@extends('maintenance.modals.user_modal')
@section('modals')
@endsection

@endsection