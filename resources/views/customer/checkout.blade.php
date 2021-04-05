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
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class ="beefandpork">
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
        </div>

                </div>
                </div>
            </div>

        
            <a href="{{url('/cart')}}" class="btn btn-sm"><i class="fas fa-arrow-left fa-2x"></i></a>

            <div class="row" id="cart-cont">
                <div class="col-sm-12 col-md-6 col-md-offset-1">
                    <h4 class="mb-4">Checkout (<span>{{ $cartCount }}</span> items)</h4>
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>

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
                            <strong>{{ $data->qty }}</strong>
                        </td>
                        <td class="col-md-1 text-center"><strong>{{ $data->price }}</strong></td>
                        <td class="col-md-1 text-center"><strong>{{ $data->amount }}</strong></td>
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
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>₱{{ number_format($subTotal,2,'.',',') }}</strong></h5></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Shipping fee</h5></td>
                    <td class="text-right"><h5><strong id="txt_shipping_fee"></strong></h5></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong id="txt_total"></strong></h3></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>    </td>
                    <td>
           </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>

                    <div class="col-lg-4 mt-3">
  
                        <!-- Card -->
                        <div class="card mb-3">
                          <div class="card-body">
                  
                
                        <form action="{{ action('Customer\CheckoutCtr@placeOrder') }}" method="POST">
                            @csrf
                            <ul class="list-group list-group-flush" id="ship-info-contr">
                
                                <div class="d-flex justify-content-between align-items-center px-0">
                                  <h4>Shipping Address</h4>
                                </div>
                
                                <Label class="label-small">Municipality</Label>
                                @php
                                    $municipality = Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->municipality : "";
                                    $mun_arr = array("Balayan", "Tuy");
                                @endphp
                                <select style="margin-bottom: 10px;" class="form-control" name="municipality" id="municipality" required> 
                                    @if(in_array($municipality, $mun_arr))
                                        <option selected value="{{ $municipality }}">{{ $municipality }}</option>
                                        @php
                                        $mun_arr = array_diff($mun_arr, array($municipality));
                                        @endphp
                                    @endif
                                    @foreach ($mun_arr as $item)    
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach          
                                </select>
                
                                <Label class="label-small">Barangay</Label>
                                <input style="margin-bottom: 10px;" type="text" class="form-control mb-3" name="brgy" 
                                value="{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->brgy : "" }}" required>
                
                                <Label class="label-small">Subd/Blk/Bldg</Label>
                                <input style="margin-bottom: 10px;" type="text" class="form-control mb-3" placeholder="flr/blk/bldg" name="flr_bldg_blk"
                                value="{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->flr_bldg_blk : "" }}" required>
                
                                <Label class="label-small">Nearest landmark</Label>
                                <textarea style="margin-bottom: 10px;" class="form-control mb-3" name="nearest_landmark"
                                 required>{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->nearest_landmark : "" }}</textarea>
                
                                <Label class="label-small">Phone number</Label>
                                <input style="margin-bottom: 10px;" type="text" class="form-control mb-3" name="phone_no" maxlength="11"
                                value="{{ Helper::getPhoneNo()!=null ? Helper::getPhoneNo() : "" }}" required>
                
                                <Label class="label-small">Email</Label>
                                <input style="margin-bottom: 10px;" type="text" class="form-control" name="email"
                                value="{{ Helper::getEmail()!=null ? Helper::getEmail() : "" }}" required><br>
            
                            </ul>
                  
                            <button type="submit" class="btn btn-sm btn-primary" style="width: 100%; height:40px;">Place Order</button>
                        </form>
                          </div>
                        </div>
                        <!-- Card -->
                        
                        
                    
                  
                      </div>
            </div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
        $(document).on('change', '#municipality', function(){
            let municipality = $(this).val();
            computeTotal(municipality);
            getShippingFee(municipality);
        });

        let municipality = $( "#municipality" ).find(":selected").text();
        computeTotal(municipality);
        getShippingFee(municipality);

        function computeTotal(municipality){
            $.ajax({
                url:"/checkout/computeTotal_ajax/"+municipality,
                type:"GET",
                success:function(response)
                {
                    $('#txt_total').text('₱'+parseFloat(response).toFixed(2));          
                }
            });
        }   

        function getShippingFee(municipality){
            $.ajax({
                url:"/checkout/getShippingFee_ajax/"+municipality,
                type:"GET",
                success:function(response)
                {
                    $('#txt_shipping_fee').text('₱'+parseFloat(response).toFixed(2));          
                }
            });
        }   
    </script>

</body>