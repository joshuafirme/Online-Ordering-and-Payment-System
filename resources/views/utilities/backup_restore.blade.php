@extends('layouts.utilities')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Backup and Restore
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Backup and Restore</li>
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
                <form method="POST" action="{{ action('Utilities\BackupAndRestoreCtr@backup') }}" style="margin:10px">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-primary m-2"><i class="fa fa-database"></i> Backup</button>
                </form>

                <form method="POST" action="{{ action('Utilities\BackupAndRestoreCtr@restore') }}" style="margin:10px">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-primary m-2"><i class="fa fa-redo-alt"></i> Restore</button>
                </form>
            </div>
        </div>


    </section><!-- /.content -->


@endsection