<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    {{--<script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    html {
  scroll-behavior: smooth;
}   

          /* Card image loading */
          .img-cont {
            width: 100%;
            height: 100%;
        }
          
        .img-cont.loading {
            width: 100%;
            height: 228px;
        }
       
        /* Card title */

          
        .desc-loading1 {
            height: 1rem;
            width: 90%;
            margin: 1rem;
            border-radius: 3px;
        }
        .desc-loading2 {
            height: 1rem;
            width: 40%;
            margin: 1rem;
            border-radius: 3px;
        }
        .desc-loading3 {
            height: 1rem;
            width: 70%;
            margin: 1rem;
            border-radius: 3px;
        }
        .desc-loading4 {
            height: 30px;
            width: 30%;
            margin: 1rem;
            border-radius: 50px;
        }
       
        /* Card description */
        .card__description {
            padding: 8px;
            font-size: 16px;
        }
          
        .card__description.loading {
            height: 3rem;
            margin: 1rem;
            border-radius: 3px;
        }
       
        /* The loading Class */
        .loading {
            position: relative;
            background-color: #e2e2e2;
        }
       
        /* The moving element */
        .loading::after {
            display: block;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            transform: translateX(-100%);
            background: -webkit-gradient(linear, left top,
                        right top, from(transparent), 
                        color-stop(rgba(255, 255, 255, 0.2)),
                        to(transparent));
                          
            background: linear-gradient(90deg, transparent,
                    rgba(255, 255, 255, 0.2), transparent);
       
            /* Adding animation */
            animation: loading 0.8s infinite;
        }
       
        /* Loading Animation */
        @keyframes loading {
            100% {
                transform: translateX(100%);
            }
        }
</style>
</head>
<body>


@include('customer.layouts.header')

<!---====Category Section=====-->
<h2 class="title-text" style="margin-left: 40px;color: #3B3B3B;">Select Category</h2>

<div id="secondary-slider" class="splide mb-2" style="padding-left: 40px; padding-right: 40px;">
  <div class="splide__arrows">
    <button class="splide__arrow splide__arrow--prev" style="margin-top:-50px; margin-left: 10px;" type="button" aria-controls="secondary-slider-track" aria-label="Go to last slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
  <button class="splide__arrow splide__arrow--next" style="margin-top:-50px; margin-right: 10px;" type="button" aria-controls="secondary-slider-track" aria-label="Next slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
</div>
@php
  $categories = app\Helpers\Base::getCategories();
@endphp
  <div class="splide__track"  id="menu-section">
    <div class="splide__list row">
    
      @foreach ($categories as $item)
        @php
            $img = $item->image!=null ? $item->image : "img-placeholder.png"
        @endphp
        <div class="splide__slide row min-ht ml-2">
            <div class="dif-cate-box">
              <a href="#menu-section" category="{{$item->category}}" class="menu-category" style="text-decoration: none;">
                <div class="img-box">
                  <img src="{{ asset('storage/'.$img)}}" class="img" alt="">
                </div>
                <div  style="padding:20px;">    
                  <p style="font-family: 'lavenda'; font-size:20px; color: #3B3B3B; font-style:italic;">{{$item->category}}</p>
                </div>
              </a>    
            </div>
        </div>
      @endforeach

    </div>
  </div>
</div>

<!----====End of Category Section======-->

<!----====Menu list======-->

<div class="container">
  <h2 class="title-text" id="category-title">Best Seller</h2>
  <hr style="margin-bottom: 25px;">
  <div class="row justify-content-center" id="loader-cont">
      <div class="col-3 text-center">
        <div class="lds-dual-ring" id="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      </div>
  </div>

    <div class="row" id="menu-container">
      <!-- populate menu with ajax  -->
  </div>

</div>

<!--=====About Section=====-->
<section id="about">
  <div>
  <h2 class="title-text">About Us</h2>
</div>
<div class="about-center">
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-dove"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Ambiance</h2>
           <p class="about-info">Hearty food and a convivial place to gather and make celebrations.</p>
       </div>
   </article>
   <!--End of single item-->
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-utensils"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Healthy Food</h2>
           <p class="about-info">Different variety of cuisines, feel satisfied, feel the energy!</p>
       </div>
   </article>
   <!--End of single item-->
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-birthday-cake"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Events and Gatherings</h2>
           <p class="about-info">Birthdays? Anniversaries? Garden Weddings? Easy on David's
               Grill Balayan!</p>
       </div>
   </article>
   <!--End of single item-->
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-glasses"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Mission</h2>
           <p class="about-info">At David's Grill, our mission is simple: to gather Christian Churches and
               see all the verses.</p>
       </div>
   </article>
   <!--End of single item-->
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-church"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Wisdom of God</h2>
           <p class="about-info">Encouraging, enlightening and sharing words of God.</p>
       </div>
   </article>
   <!--End of single item-->
   <!---Single item-->
   <article class="about">
       <div class="about-icon"><i class="fas fa-map-marker-alt"></i></div>
       <div class="about-text">
           <h2 class="about-subtitle">Good food, Good Place, Good Price</h2>
           <p class="about-info">Food as it should be. Food should taste good. It should feel good.
               It should do good things for you and the world around you.</p>
       </div>
   </article>
   <!--End of single item-->
</div>   
</section>
<!--=====End of About Section=====-->


@include('customer.layouts.footer')

<script>
	function onClickMenu(){
    document.getElementById('menu-bar').classList.toggle('change');
    document.getElementById('nav').classList.toggle('change-btn');
}

</script>
<script>
    // Open the Modal
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }
    
    // Close the Modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
    
    var slideIndex = 1;
    showSlides(slideIndex);
    
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          new Splide('#secondary-slider', { 
              fixedWidth:450,
              fixedHieght: 250,
              gap: 25,
              rewind: true,
              cover: true,
              pagination: true,
          }).mount();
      });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });

    cartCount();

    function cartCount() 
    {
        $.ajax({
          url:"/cart/cart-count",
          type:"GET",
            success:function(data){
              console.log(data);
              $('#cart_count').text(data);
            }  
        });
    }

    displayMenu();

    function displayMenu() 
    {
        $.ajax({
          url:"/menu",
          type:"GET",
            beforeSend:function(){       
              $('#loader-cont').css('display', 'flex');
            },
            success:function(data){
              console.log(data);
              cardHTML(data);
              $('#loader-cont').css('display', 'none');
            }  
        });
    }

    function displayMenuByCategory(category) 
    {
        $.ajax({
          url:"/menu/category/"+category,
          type:"GET",
            beforeSend:function(){
              $('#loader-cont').css('display', 'flex');
            },
            success:function(data){
              console.log(data);
              cardHTML(data);
              $('#loader-cont').css('display', 'none');
            }  
        });
    }

    $(document).on('click', '.menu-category', function(){
        let category = $(this).attr('category');
        
        $('#category-title').html(category);
        displayMenuByCategory(category);
    });

    function cardHTML(data){
      $('#menu-container').html('');
      if(data.length > 0){

        for (var i = 0; i < data.length; i++) {

        
          var cards = '<div class="col-xs-12 col-md-6 col-lg-4">';
              cards +=  '<div class="dif-cate-box">';

              cards +=      '<div class="img-box">';
              if(data[i].image!=null)
              {
                cards += '<div class="img-cont loading"><img src="../../storage/'+data[i].image+'" class="img loading" alt="" style="height:300px;display:none;" ></div>';
              }else{
                cards += '<img src="../../storage/img-placeholder.png" class="img loading" alt="" style="height:300px;">';
              }
              cards +=       '</div>'
              cards +=       '<div style="padding:10px;" class="menu-description">';
              cards +=         '<div class="desc-loading1 loading"><p class="desc m-0" style="display:none;font-family: lavenda, sans-serif; font-size:20px; color: #3B3B3B;">'+data[i].description+'</p></div>';
              cards +=         '<div class="desc-loading2 loading"><p class="desc" style="display:none;font-family: lavenda, sans-serif; font-size:20px; color: #FFC000;">₱'+data[i].price+'</p></div>';
              cards +=         '<div class="desc-loading3 loading"><p class="desc" style="display:none;font-family: lavenda, sans-serif; font-size:16px; color: #28A745;">Preparation time: '+data[i].preparation_time+'</p></div>';
              
              if(data[i].status=='Available')
              {
                @if(Auth::check())
                cards += '<div class="desc-loading4 loading"><button class="btn btn-sm pl-3 pr-3 add_to_cart" style="display:none;background-color:#005B96; color:#fff; border-radius:50px;"';
                cards += ' menu-id="'+data[i].id+'" amount="'+data[i].price+'">Add to tray</button></div>';
                @else
                cards += '<div class="desc-loading4 loading"><a href="/customer/customer-login" class="btn btn-sm pl-3 pr-3 add_to_cart" style="display:none;background-color:#005B96; color:#fff; border-radius:50px;"';
                cards += ' menu-id="'+data[i].id+'" amount="'+data[i].price+'">Add to tray</a></div>';
                @endif
              }else{
                cards += '<span style="color:#AA0000;">Not available</span>';
              }
              cards +=       '</div>';
          
              cards +=    '</div>';
              cards +='</div>';
          
        $('#menu-container').append(cards);
        }
      
      } 
      else{
        var cards ='<div class="row justify-content-center m-auto" style="padding-bottom:400px;">'
           cards += ' <div class="col-12 text-center">';
            cards +=  '<a class="">No menu found</a>';
            cards +='</div></div>';
        $('#menu-container').html(cards);
      }

      
      setTimeout(function(){
        $('.desc-loading1').removeClass('loading');
        $('.desc-loading1 p').css('display','block');

        $('.desc-loading2').removeClass('loading');
        $('.desc-loading2 p').css('display','block');

        $('.desc-loading3').removeClass('loading');
        $('.desc-loading3 p').css('display','block');

        $('.desc-loading4').removeClass('loading');
        $('.desc-loading4 button').css('display','block');
        $('.desc-loading4 a').css('display','block');
      },1000);

      setTimeout(function(){
        $('.img-cont').removeClass('loading');
        $('.img').css('display','block');
      },1500);
    }   
  </script>
@include('customer.js.cart')
</body>
</html>

