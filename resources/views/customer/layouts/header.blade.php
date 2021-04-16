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
      
@include('customer.layouts.topnav')