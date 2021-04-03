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
        <a href="{{ url('/do-logout') }}" title="Sign out" style="color: #DC3545;"><i class="fas fa-sign-out"></i></a>
    @else
        <a href="{{ url('/customer/customer-login') }}">Login</a>
    @endif
  </div>