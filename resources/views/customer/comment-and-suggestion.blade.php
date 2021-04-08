<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
 <!-- bootstrap 3.0.2 -->
 <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- font Awesome -->
 <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- Ionicons -->
 <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="{{asset('css/main.css')}}">
 <link rel="stylesheet" href="{{asset('css/beef_porkpg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .beefandpork{
           background:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)),
           url(/img/profile_bg.jpg) center/cover fixed no-repeat;
           color:#fff;
           grid-gap: 20px 40px;
           box-shadow: 0 8px 7px -2px gray;
       }
   </style>
<div class ="beefandpork">
    <div class="heading">
        <h1>David's Grill Restaurant</h1>
    </div>

    <a href="{{url('/')}}" class="btn btn-sm"><i class="fas fa-arrow-left fa-2x"></i></a>

        <div class="container m-xs-2">
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row">

                        <div class="col-12" style="margin-bottom:310px;">
                            
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
            </div>
        </div>
    </div>



    @include('customer.layouts.footer')