<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>David's Grill Restaurant</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	.login-form {
		width: 440px;
    	margin: 50px auto;
        margin-top: 190px
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
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
        background-color: #08AEFA;
        color: #fff;
    }
    .btn:hover {        
        color: #fff;
    }
</style>
</head>
<body style="background-image: url('img/davids_grill_logo.jpg'); background-repeat: no-repeat;">
<div class="login-form">
    
    <form action="{{ action('Customer\SignupCtr@signup') }}" method="POST">
        {{ csrf_field() }}
        @if(\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-circle"></i> </h5>
        {{ \Session::get('success') }}
        </div>      
        @endif

        @if(\Session::has('invalid'))
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-circle"></i> </h5>
        {{ \Session::get('invalid') }}
        </div>      
        @endif

        <h2 class="text-center">Signup</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Fullname" required="required" name="fullname">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone number" required="required" name="phone_no">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" required="required" name="password" id="confirm_password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block">Signup</button>
        </div>  
        
        <div class="form-group">
            <a class="signup-link" href="{{ url('/customer/customer-login') }}">Already have an account? <span >Log in</span></a>
        </div>  
    </form>
</div>
</body>
</html>                                		