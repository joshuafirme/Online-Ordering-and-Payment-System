
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="shortcut icon" type="img/png" href="img/davids_grill_logo.png">
 <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
 <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
 <title>David's Grill Restaurant</title>
 <style>
     
body{
  padding: 0px;
  margin: 0px;  
  font-family: 'Ubuntu', sans-serif;
  }   


.container{
  width: 90%;
  margin: auto;
  overflow: hidden;
  }

.heading{
  background:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)),
  url(/img/beefandporkbg2.jpg) center/cover fixed no-repeat;
  font-family: 'Kaushan Script', cursive;
  line-height: 1.5;
  color: #ffffff;
  margin-bottom: 10px;
  padding: 30px 0;
  grid-column: 1/-1;
  text-align: center;
  height: 70px;
  width: 100%;
  }
.heading>h1{
  font-weight: 40;
  font-size: 50px;
  letter-spacing: 3px;
  margin-bottom: 20px;
  margin-top: 5px;
  }
  @media screen and (min-width: 601px) {
    .heading>h1{
      font-size: 50px;
    }
  }
  @media screen and (max-width: 600px) {
    .heading>h1{
      font-size: 45px;
    }
  }
  @media screen and (max-width: 600px) {
    .heading>h1{
      font-size: 30px;
    }
  }


#contact-section{
  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.9)),
  url(img/bodybg.jpg) center/cover fixed no-repeat;
  background-size: cover;
  background-position: center;
  height: 100%;
  width: 100% ;
  padding-bottom: 2%;
  }

#contact-section .container h2{
  text-align: center;
  text-decoration: underline;
  text-underline-position: under;
  color: rgb(238, 235, 235);
  letter-spacing: 2px;     
  }

a:visited { 
  text-decoration: none; 
  color: blue;
}


#contact-section .container p{
  text-align: center; 
  width: 70%; 
  margin-left: auto;
  margin-right: auto; 
  padding-bottom: 3%;
  color: #fff;
  letter-spacing:3px;
  }

.contact-form i.fas{
  font-size: 22px; 
  padding: 3%;
  background-color: none;
  border-radius: 80%;
  margin: 2%;
  cursor: pointer;
  border:2px solid rgb(190, 190, 190);
  color: rgb(190, 190, 190);
  }
    
.contact-form i.fas:hover{
  cursor: pointer;
  border:2px solid white;
  color: white;
  }
     
.contact-form{
  display: grid;
  grid-template-columns: auto auto;
  }

#social-icons{
  height: 150px;
  padding: 70px 0 30px 0;
  }

#social-icons a{
  display: inline-block;
  padding: 5px 5px;
  margin: 0 5px;
  font-size: 40px;
  border-radius:5px;
  transition: transform 2s ease, color 2s ease;
  }

#social-icons a:hover{
  transform: translateY(-20px);
  }

.facebook{
  color: #4d71c0;
  }

.instagram{
  color:   #e1306c;
  }

.form-info{
  font-size: 16px;
  font-style: bold;
  color: white;
  letter-spacing: 1px;
  }
    
input{
  padding: 10px;
  margin:10px;
  width: 70%;
  background-color:rgba(136, 133, 133, 0.5);
  color: white;
  border: none;
  outline:none;
  }

input::placeholder{
  color: white;
  }
    
textarea{
  padding: 10px;
  margin: 10px;     
  width: 70%;
  background-color:rgba(136, 133, 133, 0.5);
  color: white;
  border: none;
  outline:none;
  font-size: inherit;
  font-weight: inherit;
  text-decoration: none;
  font-family: inherit;
  }

textarea::placeholder{
  color: white;
  }
     
.submit{
  width: 40%;
  background: none;
  padding: 4px;
  outline: none;
  font-size: 13px;
  font-weight: bold;
  letter-spacing: 2px;
  height: 33px;
  text-align: center;
  cursor: pointer;
  letter-spacing: 2px;
  margin-left: 1.5%;
  border:2px solid rgb(190, 190, 190);
  border-radius: 5px;
  color: rgb(190, 190, 190);
  font-family: inherit;
  }

.submit:hover{
  border: 1px solid #fff;
  color: #fff;
  cursor: pointer;
  }

@media (max-width: 768px){
  #contact-section .contact-form{
    display: block;
    width: 100%;
    text-align: center;
  }

  #contact-section .submit{
        width: 60%;
      }
  }
 </style>
</head>
<body>

 
 <div class ="Menu">
   <div class="heading">
     <h1>David's Grill Restaurant</h1>
   </div>
 </div>

  <!-- contact section -->
 <section id="contact-section">
   <div class="container">
     <h2>Contact Us</h2>
       <p>How can we help you? Message us now.</p>
   <div class="contact-form">
   <!-- First grid -->
   <div>
   <a href="https://www.google.com/maps/@13.9507422,120.7023993,3a,75y,182.85h,75.63t/data=!3m6!1e1!3m4!1sI4yVXq7rO51Bwegq7aw3Xg!2e0!7i13312!8i6656" target="_blank">
   <i class="fas fa-location-arrow"></i><span class="form-info">  Brgy. Sambat, Balayan Batangas</span><br>
   </a>
   <i class="fas fa-phone" > </i><span class="form-info">  +63 953 139 7371</span><br>
   <a href = "mailto: davidsgrillrestaurant@gmail.com" target="_blank">
   <i class="fas fa-envelope"></i><span class="form-info">  davidsgrillrestaurant@gmail.com</span><br>
   </a>            
                
 <section id="social-icons">
   <a href="https://www.facebook.com/DavidsGrillbyBe4" target="_blank"><i class="fab fa-facebook facebook"></i></a>
   <a href="https://www.instagram.com/explore/locations/105198337731884/davids-grill/" target="_blank"><i class="fab fa-instagram instagram"></i></a>
 </section>
   </div>
              
   <!-- second grid -->
   <div>        
     <form>
       <input type="text" placeholder="First Name" required>
       <input type="text" placeholder="Last Name" required><br>
       <input type="Email" placeholder="Email" required><br>
       <input type="text" placeholder="Subject" required><br>
       <textarea name="Message" placeholder="Type Here" rows="5" required></textarea><br>
       <button class="submit" >Send Message</button> 
     </form>   
   </div>
   </div>
   </div>
 </section> 
</body>