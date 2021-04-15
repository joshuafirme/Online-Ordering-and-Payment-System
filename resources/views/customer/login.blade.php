<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>David's Grill Restaurant</title>
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<style>
	.login-form {
		width: 340px;
        margin-top: 50px;
        margin-left: 100px;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 1px 10px 10px 10px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border-radius: 6px;
        text-align: center;
        margin-left: 110%;
        margin-right: -120%;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .btn-google{
        display: block;
        width: 100%;
        height: 40px;
        outline: none;
        color: black;
        border: 2px solid #30377A;
        font-size: 11pt;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
        background: url('https://img.icons8.com/color/48/000000/google-logo.png') #f2f2f2;
        background-position: left;	
        background-repeat: no-repeat;
        background-size: 40px 40px;
        background-color: #fff;
}
    input{
            border-radius: 50px !important;
        }
    button,a{
        border-radius: 50px !important;
    }
    bosdy {
    background-image: url("/img/davids_grill_logo.jpg");
     /* Full height */
    height: 100%;
    background-attachment: fixed;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
</head>
<body>
    <div class ="Menu"> 
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
        </div>
      </div>
          
      <div class="topnav">
        <a href="{{ url('/') }}">Home</a>
      </div>
<div class="login-form">
    
    <form action="{{ action('Customer\LoginCtr@login') }}" method="POST">
        @csrf
        
        @if(\Session::has('invalid'))
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-circle"></i> </h5>
        {{ \Session::get('invalid') }}
        </div>      
        @endif

        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username" id="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>      

        
    <div class="form-group">
        <a href="{{ url('user-login/google') }}" class="btn btn-primary btn-block btn-google">Google Log in</a>
        <a class="signup-link" href="{{ url('/signup') }}">Don't have an account? <span >Sign up now.</span></a>
    </div>  
    </form>
</div>
</body>
</html>                                		