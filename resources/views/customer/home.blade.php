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
      <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <style>
        /* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.7);

}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  width: 90%;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
  background-color: black
  border-radius: 3px 0 0 3px;
}

/* Hide the slides by default */
.mySlides {
  display: none;
  margin-left: 10%;
  margin-top: -90px;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */


img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    </style>
</head>
<body>

  <a href="{{ url('/profile') }}">
    <img style="margin: 15px;" class="img-profile rounded-circle" src="{{asset('img/profile.svg')}}" width="50px"> {{ Helper::getName() }}
  </a>
  <ul class="navbar-nav ml-auto">
  
       <!-- Nav Item - User Information -->
       <li class="nav-item dropdown no-arrow">
         
      </li>
  
  
      
  
      <div class="topbar-divider d-none d-sm-block"></div>
  
  
  </ul>
  
  </nav>
  <!-- End of Topbar -->


<!--Nav bar-->
   
<div id="menu" class="menu">
    <div id="menu-bar" onclick="onClickMenu()">
    <div id="bar1" class="bar"></div>
    <div id="bar2" class="bar"></div>
    <div id="bar3" class="bar"></div>

<ul id="nav" class="nav">
    <li><a href="#">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#CategoryIcons">Menu</a></li>
    <li><a href="#">Contact</a></li>
</ul>
</div>
</div>
<!--End of Nav bar-->

    <header class="header">
        <div class="homebg">
            <h1 class="title">·David's Grill Restaurant·</h1>
            <a href="#CategoryIcons" class="ordernow-button pulsate">Order Now</a>
  
    </header>

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

<!---=======Gallery Section======-->
<section id="gallery">
    <div>
    <h2 class="title-text">Gallery</h2>
 </div>
 <div id="gallery-center">
    @foreach ($gallery as $data)
     <article class="gallery-item">
         <a  onclick="openModal();currentSlide(1)">
            <img src="{{ asset('storage/'. $data->image) }}" alt={{$data->image}}>
        </a>
     </article>
    @endforeach
    
 </div>

 <!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">  
    @foreach ($gallery as $data)
      <div class="mySlides">
            <img src="{{ asset('storage/'. $data->image) }}" alt={{$data->image}} style="width:90%;">
      </div>
      @endforeach
  
      <!-- Next/previous controls -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
      <!-- Caption text -->
      <div class="caption-container">
        <p id="caption"></p>
      </div>
  
      <!-- Thumbnail image controls -->
      
    
    </div>
  </div>
 </section>
 

<!---=======End of Gallery Section======-->

<!---====Category Section=====-->
<section id="CategoryIcons">

	<a href="/menu/beef_and_pork">
    <article class="icon">
    <i class="fas fa-cloud-meatball"></i>
    <h3> Beef & Pork</h3>
    </article></a>
    
	<a href="/menu/chicken_and_goat">
    <article class="icon">
    <i class="fas fa-drumstick-bite"></i> 
    <h3> Chicken & Goat</h3>
    </article></a>
    
	<a href="/menu/vegetables_and_seafoods">
    <article class="icon">
    <i class="fas fa-pastafarianism"></i>
    <h3> Vegetables & Seafoods</h3>
    </article></a>

	<a href="/menu/rice_and_soup">
    <article class="icon">
    <i class="fas fa-utensil-spoon"></i>
    <h3> Rice & Soup</h3>
    </article></a>

	<a href="/menu/noodles_and_bilao">
    <article class="icon">
    <i class="fas fa-stroopwafel"></i>
    <h3> Noodles & Bilao</h3>
    </article></a>

</section>

<!----====End of Category Section======-->

<!----======Card Section=====----->

<section id="food">
    <div>
    <h2 class="title-text"> Food Fusion</h2>
     </div>
   <div class="food-container">

           <!--======Card Start=====-->

            <article class="food-card">
            
           <img src="{{asset('img/breakfast.jpg')}}" class="food-img"alt="">
           <div class="img-text">
               <h1>All-Day Breakfast</h1>
           </div>
           <div class="img-footer">
               <div class="footer-icon">
               </div>
               <div class="footer-btn">
                 <a href="/menu/allday_breakfast" class="food-btn">Order Now</a>  
               </div>
           </div>
           </article>
           <article class="food-card">
             <img src="{{asset('img/valuemeal.jpg')}}" class="food-img"alt="">
             <div class="img-text">
                 <h1>Value Meals</h1>
             </div>
             <div class="img-footer">
                 <div class="footer-icon">
                 </div>
                 <div class="footer-btn">
                   <a href="/menu/value_meals"class="food-btn">Order Now</a>  
                 </div>
             </div>
             </article>
             <article class="food-card">
                 <img src="{{asset('img/sizzlingplate.jpg')}}" class="food-img"alt="">
                 <div class="img-text">
                     <h1>Sizzling Plates</h1>
                 </div>
                 <div class="img-footer">
                     <div class="footer-icon">
                     </div>
                     <div class="footer-btn">
                        <a href="/menu/sizzling_plates"class="food-btn">Order Now</a>  
                     </div>
                 </div>
                 </article>
                 <article class="food-card">
                    <img src="{{asset('img/combomeals.jpg')}}" class="food-img"alt="">
                    <div class="img-text">
                        <h1>Combo Meals</h1>
                    </div>
                    <div class="img-footer">
                        <div class="footer-icon">
                        </div>
                        <div class="footer-btn">
                            <a href="/menu/combo_meals"class="food-btn">Order Now</a>  
                        </div>
                    </div>
                    </article>
    </div>
</section>
<!----======End of Card Section=====-->

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
</body>
</html>

