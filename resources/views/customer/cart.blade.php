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
    <link rel="stylesheet" href="{{asset('css/beef_porkpg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class ="beefandpork">
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
            <h2>&mdash; All-Day Breakfast &mdash;</h2>
            <i class="fas fa-shopping-cart"></i>
            <h5>Go to Cart</h5>
        </div>

                </div>
                </div>
            </div>

        


            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cart as $data)
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                        <a class="thumbnail pull-left " href="#"> <img class="media-object " src="https://adc3ef35f321fe6e725a-fb8aac3b3bf42afe824f73b606f0aa4c.ssl.cf1.rackcdn.com/tenantlogos/28859.png" style="width: 100px; height: 100px;"> </a>
                        <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{ $data->description }}</a></h4>
                        <h5 class="media-heading"> by <a href="#">Hertz</a></h5>
                        <span>Preparation time: </span><span class="text-success"><strong>{{ $data->preparation_time }}</strong></span>
                        </div>
                        </div></td>
                        <td class="col-md-1 text-left"><strong class="label label-success">Preparing</strong></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $data->qty }}">
                        </td>
                        <td class="col-md-1 text-center"><strong>{{ $data->price }}</strong></td>
                        <td class="col-md-1 text-center"><strong>{{ $data->amount }}</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                        <span class="fa fa-remove"></span> Remove
                        </button></td>
                        </tr> 
                    @endforeach					
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>$999.99</strong></h5></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Estimated shipping</h5></td>
                    <td class="text-right"><h5><strong>$9.999.99</strong></h5></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>$9.999.99</strong></h3></td>
                    </tr>
                    <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                    <button type="button" class="btn btn-default">
                    <span class="fa fa-shopping-cart"></span> Continue Shopping
                    </button></td>
                    <td>
                    <button type="button" class="btn btn-success">
                    Checkout <span class="fa fa-play"></span>
                    </button></td>
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


    $('.add_to_cart').click(function(){
        let menu_id = $(this).attr('menu-id');
        let amount = $(this).attr('amount');
        addToCart(menu_id, amount);
    });

    function addToCart(menu_id, amount){
        $.ajax({
            url:"/cart/add",
            type:"POST",
            data:{
                menu_id:menu_id,
                amount:amount
            },
            success:function(response){
            alert('Menu was successfully added to cart!');
        
            }
        });
    }    

</script>
</body>