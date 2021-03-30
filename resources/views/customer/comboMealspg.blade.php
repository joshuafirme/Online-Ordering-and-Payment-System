<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/beef_porkpg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class ="beefandpork">
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
            <h2>&mdash; Combo Meals &mdash;</h2>
            <a href="/cart" style="color: #fff;"><i class="fas fa-shopping-cart"></i></a>
        </div>
        <a href="{{url('/home')}}" class="btn btn-sm" style="margin-left:15px; color: #fff;"><i class="fas fa-arrow-left fa-2x"></i></a>
        <!---====Items===-->
        <!---====Beef===-->
        @foreach($comboMeals as $data)
        <div class="food-items">
            <img src="{{asset('storage/'.$data->image)}}">
            <div class="details">
            <div class="details-sub">
            <h3>{{ $data->description }}</h3>
            <h3 class="price"> P{{ $data->price }}</h3>
            @if($data->status == 'Available')
            <button type="submit" class="add_to_cart" menu-id="{{ $data->id }}" amount="{{ $data->price }}">Add to Cart</button>
            @else
                <p style="color: red;">Not Available</p>
            @endif
            </div>
            </div>
        </div>
    @endforeach

</div>
@include('customer.js.cart')>
</body>