@extends('layouts.utilities')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Audit Trail
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Audit Trail</li>
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
                        
                        <div class="row" style="margin-left: 1px;">
                            <div style="margin-top: 5px;">
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="date_from" value="{{ date('Y-m-d') }}">
                                </div>
                                <div> 
                                    --
                                </div>
                                <div class="col-sm-2" style="margin-top: -20px; margin-left: 10px;">
                                <input type="date" class="form-control" id="date_to" value="{{ date('Y-m-d') }}">
                                </div> 
                            </div>  
                        </div>
                    <div class="box-body table-responsive">
                        <table id="audit-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Role</th>
                                    <th>Module</th>
                                    <th>Action</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /.content -->


@endsection