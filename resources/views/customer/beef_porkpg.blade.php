<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
    <link rel="stylesheet" href="{{asset('css/beef_porkpg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class ="beefandpork">
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
            <h2>&mdash; Beef and Pork &mdash;</h2>
            <h4>(Good for 2-3 persons)</h4>
            <a href="/cart" style="color: #fff;"><i class="fas fa-shopping-cart"></i></a>
        </div>

        <!---====Items===-->
        <!---====Beef===-->
        @foreach($beefAndPork as $data)
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
@include('customer.js.cart')
</body>