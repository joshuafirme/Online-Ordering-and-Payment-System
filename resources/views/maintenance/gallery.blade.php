@extends('layouts.maintenance')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gallery Maintenance
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Maintenance</li>
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal" id="btn-add"><span class='fa fa-plus'></span> Add</button> 
             </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Gallery Maintenance</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="gallery-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($gallery)
                                @foreach($gallery as $data)
                                <tr>
                                    <th><img src="{{asset('storage/'.$data->image.'')}}" style="width:400px;"> </th>
                                    <th><a class="btn btn-sm" id="btn-delete-gallery" delete-id="{{ $data->id }}"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                                @else
                                <p>Your gallery is empty</p>
                                @endif

                            <div class="pl-2">
                                {{ $gallery->links() }}
                            </div>               
                    </div>
                </div>
            </div>
        </div>
        
    </section><!-- /.content -->

@extends('maintenance.modals.gallery_modal')
@section('modals')
@endsection

@endsection