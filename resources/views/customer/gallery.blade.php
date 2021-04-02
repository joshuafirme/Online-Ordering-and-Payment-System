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
    
    <style>
      .btn-order {
  background-color: #005B96; /* Green */
  border: none;
  border-radius: 50px;
  cursor: pointer;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 8px;
}
      .dif-cate-box { padding: 0; border: 0px solid #e6e6e6; border-radius: 0px; box-shadow: 0px 3px 18px #1672b021; margin-bottom: 35px;}
.min-ht .dif-cate-box{ min-height: 300px;}
.dif-cate-box .img-box{padding-left:0; padding-right:0;}
.dif-cate-box .img-box .img{width: 100%; max-height: 228px; object-fit: cover;}
.dif-cate-box .disc-wrp{padding: 15px 18px; text-align: center;}
.dif-cate-box .disc-wrp h4, .fourBlock h4{font-size: 18px; color:#00192b; font-family: 'Poppins', sans-serif; font-weight: 600; margin-bottom: 8px;}
.dif-cate-box .disc-wrp p, .fourBlock p{color: #666666; font-size: 13px; font-family: 'Poppins', sans-serif; line-height: 19px; margin-bottom:0;}
.home-signup-btn{font-size:17px; color:#FFF; font-family: 'Poppins', sans-serif;}

.cateTtl h2{font-size:30px; color:#263238; font-family: 'Poppins', sans-serif; margin-bottom: 0;}

.newTtl h2{font-size:30px; color:#263238; font-family: 'Poppins', sans-serif; margin-bottom: 0;}

.whtTtl h2{font-size:30px; color:#fff; font-family: 'Poppins', sans-serif;}

.cateTtl h2 span, .newTtl h2 span, .whtTtl h2 span{font-weight: 600;}

.mb-30 {margin-bottom: 30px;}

@media screen and (max-width: 653px) {
    ul.icon-img-list{padding:0 35px;}
    ul.icon-img-list li {width: 100%; min-width: 100%; margin-left:0px !important; margin-right:0 !important;}
}
@media screen and (max-width: 767px) {
    .min-ht .dif-cate-box{min-height: auto;}
}
@media only screen and (min-device-width : 992px) and (max-device-width : 1199px) {
    .dif-cate-box{min-height: 318px;}
}
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
<!--Nav bar-->
   
<div id="menu" class="menu">
    <div id="menu-bar" onclick="onClickMenu()">
    <div id="bar1" class="bar"></div>
    <div id="bar2" class="bar"></div>
    <div id="bar3" class="bar"></div>

<ul id="nav" class="nav">
    <li><a href="#">Home</a></li>
    <li><a href="{{ url('/profile') }}">Profile</a></li>
    <li><a href="{{ url('/cart') }}">Cart</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#CategoryIcons">Menu</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="{{ url('/do-logout') }}">Logout</a></li>
</ul>
</div>
</div>
<!--End of Nav bar-->

    <header class="header">
        <div class="homebg">
            <h1 class="title">·David's Grill Restaurant·</h1>
            <a href="#CategoryIcons" class="ordernow-button pulsate">Order Now</a>
  
    </header>


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

