<div class="topnav">
    @if(Auth::check())
        <a href="{{ url('/') }}" title="Home"><i class="fas fa-home"></i></a>
        <a href="{{ url('/profile') }}" title="Profile"><i class="fas fa-user"></i></a>
        <a href="{{ url('/purchased-history') }}" title="Purchased History"><i class="fas fa-cube"></i></a>
        <a href="{{ url('/do-logout') }}" title="Sign out" style="color: #DC3545;"><i class="fa fa-sign-out"></i></a>
    @else
        <a href="{{ url('/customer/customer-login') }}">Login</a>
    @endif

        <a href="{{ url('/customer/gallery') }}">Gallery</a>
        <a href="{{ url('/contact-us') }}">Contact us</a>
        <a href="{{ url('/customer/comment-and-suggestion') }}">Comments and suggestions</a>
        
  </div>