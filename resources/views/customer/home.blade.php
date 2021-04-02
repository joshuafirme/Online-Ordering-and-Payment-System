<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>
<body>


<div class ="Menu"> 
  <div class="heading">
      <h1>David's Grill Restaurant</h1>
      <h2>&mdash; Our Menu &mdash;</h2>
      <i class="fas fa-shopping-cart"></i><span class="cart-badge">{{ app\Helpers\Base::getCartCount() }}</span>
  </div>
</div>
    
<div class="topnav">
  <a href="{{ url('/') }}">Home</a>
  <a href="{{ url('/profile') }}">My account</a>
  <a href="{{ url('/orders') }}">My orders</a>
</div>

<!---====Category Section=====-->
<h2 class="title-text" style="margin-left: 40px;color: #3B3B3B;">Menu Categories</h2>

<div id="secondary-slider" class="splide" style="padding-left: 40px; padding-right: 40px;">
  <div class="splide__arrows">
    <button class="splide__arrow splide__arrow--prev" style="margin-top:-50px; margin-left: 10px;" type="button" aria-controls="secondary-slider-track" aria-label="Go to last slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
  <button class="splide__arrow splide__arrow--next" style="margin-top:-50px; margin-right: 10px;" type="button" aria-controls="secondary-slider-track" aria-label="Next slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
</div>
@php
  $categories = app\Helpers\Base::getCategories();
@endphp
  <div class="splide__track">
    <div class="splide__list row">
    
      @foreach ($categories as $item)
        <div class="splide__slide row min-ht ml-2">
          <div class="dif-cate-box">
            <a href="{{url('/')}}/website-it-software/" style="text-decoration: none;">
              <div class="img-box">
                <img src="{{asset('img/sizzlingplate.jpg')}}" class="img" alt="">
              </div>
              <div  style="padding:20px;">    
                <p style="font-family: 'Roboto', sans-serif; font-size:20px; color: #3B3B3B;">{{$item->category}}</p>
              </div>
            </a>        

          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>

<!----====End of Category Section======-->

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




   <!---=====Social Icons=====-->
   <section id="social-icons">
    <a href="https://www.facebook.com/DavidsGrillbyBe4" target="_blank"><i class="fab fa-facebook facebook"></i></a>
    <a href=""><i class="fab fa-twitter twitter"></i></a>
    <a href="https://www.instagram.com/explore/locations/105198337731884/davids-grill/" target="_blank"><i class="fab fa-instagram instagram"></i></a>
    <a href="#"><i class="fab fa-google-plus plus"></i></a>
</section>
<!--=====End of Social Icons======-->

<!---=====Footer========-->
<footer class="footer">

    <div class="section-center">
        <p class="text">
            &copy; <span>David's Grill Restaurant</span> 
        </p>
    </div>

   </footer>
<!---=====End of Footer====-->

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
</body>
</html>

