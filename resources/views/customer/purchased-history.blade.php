@include('customer.layouts.header2')

        
            <a href="{{url('/')}}" class="btn btn-sm"><i class="fas fa-arrow-left fa-2x"></i></a>

            <div class="row" id="cart-cont">
         

                <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-bottom: 15px;"><h3>Purchased History</h3></div>

                @foreach ($orders as $data)
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover" style="margin-bottom: 25px;">
                    <thead>
                    <tr>
                    <th>Order #{{$data->order_no}}</th>
                    <th></th>
                        @if($data->payment_method)
                            <th class="text-center">Payment method: </th>
                            <th class="text-center">{{$data->payment_method}}</th>
                        @else
                            <th class="text-center"></th>
                            <th class="text-center"><button class="btn btn-sm btn-success">Pay now ></button></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $order_menus = Helper::getMenuByOrderNumber($data->order_no);
                    @endphp

                    @foreach ($order_menus as $data)
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                        <a class="thumbnail pull-left " href="{{ asset('storage/'.$data->image) }}"> <img class="media-object " src="{{ asset('storage/'.$data->image) }}" style="width: 100px; height: 100px; object-fit: cover;"> </a>
                        <div class="media-body">
                        <h4 class="media-heading">{{ $data->description }}</h4>
                        <h5 class="media-heading"> Category: {{ $data->category }}</h5>
                        <span>Preparation time: </span><span class="text-success"><strong>{{ $data->preparation_time }}</strong></span>
                        </div>
                        </div></td>
                        <td class="col-md-2">
                            <strong>Qty: {{ $data->qty }}</strong>
                        </td>
                        <td class="col-md-1 text-center"><strong>Price: {{ $data->price }}</strong></td>
                        <td class="col-md-1 text-center"><strong>Amount: {{ $data->amount }}</strong></td>
                    </tr>
                    @endforeach
              
              
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td><h4>Total:</h4></td>
                    <td class="text-right"><h4><strong>₱{{ Helper::getTotalAmount($data->order_no) }}</strong></h4></td>
                    </tr>
                    
                    </tbody>
                    </table>
             
                    </div>
                @endforeach
          

                    
            </div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });

         getSubTotal();

         function getSubTotal(){
            $.ajax({
                url:"/cart/subtotal",
                type:"GET",
                success:function(subtotal)
                {
                    if(subtotal > 300){
                        $('#btn-checkout').attr('disabled', false); 
                        $('#note').css('display', 'none'); 
                    }    
                    else
                    {
                        $('#btn-checkout').attr('disabled', true); 
                        $('#note').css('display', 'block'); 
                    }     
                }
            });
        }   
    
    
        $(document).on('click', '#btn-inc', function(){
            let menu_id = $(this).attr('menu-id');
            let qty = $(this).attr('qty');
            increaseQty(menu_id, qty);
            getSubTotal();
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
            getSubTotal();
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
            getSubTotal();
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