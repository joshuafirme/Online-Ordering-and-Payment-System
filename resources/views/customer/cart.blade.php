@include('customer.layouts.header2')

        
            <a href="{{url('/')}}" class="btn btn-sm"><i class="fas fa-arrow-left fa-2x"></i></a>

            <div class="row" id="cart-cont">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <h4 class="mb-4">Cart (<span>{{ $cartCount }}</span> items)</h4>
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($cart) > 0)
                    @foreach ($cart as $data)
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                        <a class="thumbnail pull-left " href="#"> <img class="media-object " src="{{ asset('storage/'.$data->image) }}" style="width: 100px; height: 100px; object-fit: cover;"> </a>
                        <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{ $data->description }}</a></h4>
                        <h5 class="media-heading"> Category: {{ $data->category }}</h5>
                        <span>Preparation time: </span><span class="text-success"><strong>{{ $data->preparation_time }}</strong></span>
                        </div>
                        </div></td>
                        <td class="col-md-2">
                            <button class="btn btn-sm" id="btn-dec" menu-id="{{ $data->menu_id }}" qty="{{ $data->qty - 1 }}"
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><i class="fas fa-minus"></i></button>
  
                              <input class="quantity" min="0" id="item-qty" name="quantity" type="number" style="width: 40px;" value="{{ $data->qty }}">
  
                              <button class="btn btn-sm" id="btn-inc" menu-id="{{ $data->menu_id }}" qty="{{ $data->qty + 1 }}"
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><i class="fas fa-plus"></i></button>
                        </td>
                        <td class="col-md-1 text-center"><strong>{{ $data->price }}</strong></td>
                        <td class="col-md-1 text-center"><strong>{{ $data->amount }}</strong></td>
                        <td class="col-md-1">
                            <button class="btn btn-danger btn-remove" menu-id="{{ $data->menu_id }}">
                                <span class="fa fa-remove"></span> Remove
                            </button>
                        </td>
                        </tr> 
                    @endforeach	
                    @else
                    <div class="alert alert-danger" style="margin-top: 20px;" role="alert">
                        Your cart is empty!
                      </div>
                    @endif
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>₱{{ number_format($subTotal,2,'.',',') }}</strong></h3></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                    <a href="{{ url('/home') }}" class="btn btn-default">
                    <span class="fa fa-shopping-cart"></span> Continue Shopping
                    </a></td>
                    <td>
                    <a href="{{ url('/checkout') }}" class="btn btn-primary">
                    Checkout <span class="fa fa-play"></span>
                    </a></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
            </div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });
    
    
        $(document).on('click', '#btn-inc', function(){
            let menu_id = $(this).attr('menu-id');
            let qty = $(this).attr('qty');
            increaseQty(menu_id, qty);
        });
    
        function increaseQty(menu_id, qty){
            $.ajax({
                url:"/cart/increase-qty/"+menu_id+"/"+qty,
                type:"POST",
                success:function(response)
                {
                    $('#cart-cont').load('cart #cart-cont'); 
                    if(qty==0){
                        removeMenu(menu_id);
                    }         
                }
            });
        }   
        
        $(document).on('click', '#btn-dec', function(){
            let menu_id = $(this).attr('menu-id');
            let qty = $(this).attr('qty');
            decreaseQty(menu_id, qty);
        });
    
        function decreaseQty(menu_id, qty){
            $.ajax({
                url:"/cart/decrease-qty/"+menu_id+"/"+qty,
                type:"POST",
                success:function(response)
                {
                    $('#cart-cont').load('cart #cart-cont');  
                    if(qty==0){
                        removeMenu(menu_id);
                    }      
                }
            });
        }  
        
        $(document).on('click', '.btn-remove', function(){
            let menu_id = $(this).attr('menu-id');
            removeMenu(menu_id);
        });

        function removeMenu(menu_id){
            $.ajax({
                url:"/cart/remove-menu/"+menu_id,
                type:"POST",
                success:function(response)
                {
                    $('#cart-cont').load('cart #cart-cont');        
                }
            });
        }   
    
    </script>
</body>