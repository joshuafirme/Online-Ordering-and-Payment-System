@include('customer.layouts.header2')

            <div class="row" id="cart-cont" style="margin: 5px;">

                <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-bottom: 15px;">
                    @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fa fa-check-circle"></i> </h5>
                      {{ \Session::get('success') }}
                    </div>      
                    @endif
                </div>

         

                <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-bottom: 15px;"><h3>Purchased History</h3></div>
                @if($orders->count()>0)
                @foreach ($orders as $data)
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover" style="margin-bottom: 75px;">
                    <thead>
                    <tr>
                    <th><h4>Order #{{$data->order_no}}</h4></th>
                    @php
                        switch ($data->status) {
                            case 0:
                                $status = 'Payment pending';
                                break;
                            case 1:
                                $status = 'Pending';
                                break;
                            case 2:
                                $status = 'Preparing';
                                break;
                            case 3:
                                $status = 'Dispatch';
                                break;
                            case 4:
                                $status = 'Delivered';
                                break;
                            default:
                                $status = 'Cancelled';
                                break;
                        }
                        
                    @endphp
                    <th>Status: <span style="color: #28A745;">{{ $status }}</span></th>
                        @if($data->payment_method)
                            <th class="text-center">Payment method: <span></span></th>
                            <th class="text-center" style="color: #2375BB;">{{$data->payment_method}}</th>
                        @elseif($data->status!=-1)
                        <th class="text-center">
                            <button class="btn btn-sm btn-success" 
                                onclick="putSession({{$data->order_no}})">Pay now >
                            </button>
                        </th>
                        <th class="text-center">
                            <button class="btn btn-sm btn-danger" id="btn-cancel" order-no="{{$data->order_no}}"
                                data-toggle="modal" data-target="#cancelModal">Cancel
                            </button>
                        </th>
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
                @else
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" style="margin-top: 20px;" role="alert">
                        You have no purchased yet.
                    </div>
                </div>
                @endif
          

                    
            </div>

     <!--Confirm cancel Modal-->
  <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ action('Customer\PurchasedHistoryCtr@cancelOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="order_no">
            <p id="confirm-msg"></p>
            </div>
            <div class="modal-footer">
            <button class="btn btn-sm btn-outline-dark" type="submit">Yes</button>
            <button class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });
 
         function putSession(order_no)
         { 
            $.ajax({
                url:"/sessionOrderNo/"+order_no,
                type:"GET",
                    success:function(token)
                    {
                        window.location.href = "/payment/token="+token;
                    }  
            });
         }

         $(document).on('click', '#btn-cancel', function(){
            let order_no = $(this).attr('order-no');
            $('#confirm-msg').text("Are you sure do you want to cancel order #"+order_no);
            $('input[name="order_no"]').val(order_no);
        });
    
    </script>
</body>