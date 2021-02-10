@extends('customer.layouts.main')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Comment and Suggestion
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Comment and Suggestion</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-6">
                <div class="box box-primary">
                    <form role="form" action="{{action('Customer\CommentAndSuggestionCtr@store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                            
                            @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-check-circle"></i> </h5>
                            {{ \Session::get('success') }}
                            </div>      
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Comment</label>
                                <textarea class="form-control" name="comment" placeholder="Enter your comment"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Suggestion</label>
                                <textarea class="form-control" name="suggestion" placeholder="Enter your suggestion"></textarea>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section><!-- /.content -->


@endsection