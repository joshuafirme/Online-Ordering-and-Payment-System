@include('customer.layouts.header2')

        
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
                            <input type="hidden" name="token" value="{{ csrf_token() }}">
                            <ul class="list-group list-group-flush" id="ship-info-contr">
                
                                <div class="d-flex justify-content-between align-items-center px-0">
                                  <h4>Shipping Address</h4>
                                </div>
                
                                <Label class="label-small">Municipality</Label>
                                @php
                                    $municipality = Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->municipality : "";
                                    $mun_arr = array("BALAYAN", "TUY");
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

                                <select class="form-control" name="brgy">
                                    
                                </select>
                
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
          initMunicipality();

function initMunicipality()
{
    var municipality =$('select[name=municipality]').val();

    if(municipality){       
        getBrgy(municipality);
    }
}

$('select[name=municipality]').change(function () {
      var municipality = $(this).val();
        computeTotal(municipality);
        getShippingFee(municipality);
        getBrgy(municipality);
      
});            
      
function getBrgy(municipality_name) 
{
  $.ajax({
          url: '/getBrgyList/'+municipality_name,
          tpye: 'GET',
          success:function(data){
              $('select[name=brgy]').empty();
              for (var i = 0; i < data['barangay_list'].length; i++) 
              {
                  $('select[name=brgy]').append('<option value="' + data['barangay_list'][i] + '">' + data['barangay_list'][i] + '</option>');
              }
            
      
          }
        });
  
}


getUserBrgy();

function getUserBrgy() 
{
  $.ajax({
          url: '/getUserBrgy',
          tpye: 'GET',
          success:function(data){
              $("select[name=brgy] option[value="+data+"]").attr('selected','selected');
              console.log('selected');
          }
        });
  
  }

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