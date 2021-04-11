<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<style>
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    </style>
<div class ="Menu"> 
    <div class="heading">
        <h1>David's Grill Restaurant</h1>
        <h2>&mdash; Our Menu &mdash;</h2>
        @if(Auth::check())
            <a href="{{ url('/cart') }}">
                <i class="fas fa-shopping-cart" style="color: #fff;"></i><span style="margin-left: -10px;" class="cart-badge" id="cart_count"></span>
            </a>
        @endif

    </div>
  </div>
      
  <div class="topnav">
    @if(Auth::check())
        <a href="{{ url('/') }}" title="Home"><i class="fas fa-home"></i></a>
        <a href="{{ url('/profile') }}" title="Profile"><i class="fas fa-user"></i></a>
        <a href="{{ url('/orders') }}" title="My Orders"><i class="fas fa-cube"></i></a>
        <a href="{{ url('/do-logout') }}" title="Sign out" style="color: #DC3545;"><i class="fa fa-sign-out"></i></a>
    @else
        <a href="{{ url('/customer/customer-login') }}">Login</a>
    @endif

        <a href="{{ url('/customer/gallery') }}">Gallery</a>
        <a href="{{ url('/contact-us') }}">Contact us</a>
        <a href="{{ url('/customer/comment-and-suggestion') }}">Comments and suggestions</a>
        
  </div>