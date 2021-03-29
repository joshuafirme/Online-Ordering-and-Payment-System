<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
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

        <!---====Items===-->
        <!---====Beef===-->
        @foreach($alldayBreakfast as $data)        
            {{--<form action="{{ action('Customer\CartCtr@addToCart') }}" method="POST">--}}
                @csrf
                <input type="hidden" name="menu_id" value="{{ $data->id }}">
                <input type="hidden" name="amount" value="{{ $data->price }}">
            <div class="food-items">
                <img src="{{asset('storage/'.$data->image)}}">
                <div class="details">
                <div class="details-sub">
                <h3>{{ $data->description }}</h3>
                <h3 class="price"> P{{ $data->price }}</h3>
                @if($data->status == 'Available')
                    <button type="submit" id="add_to_cart" menu-id="{{ $data->id }}" amount="{{ $data->price }}">Add to Cart</button>
                @else
           {{-- </form>--}}
                    <p style="color: red;">Not Available</p>
                @endif
                </div>
                </div>
            </div>
        @endforeach

        



    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });


    $('#add_to_cart').click(function(){
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
            alert('You have successfully added to cart!');
        
            }
        });
    }    

</script>
</body>