<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sport pro</title>
    <center><h3 style="font-family: cursive;">Here's The  Sport Sphere.....</h3></center>
    <link rel="stylesheet" href="hmpg.css">
    <style>
        body
             {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        header {
            background-color:lightpink;
            color: #fff;
            padding: 1em;
            text-align: center;
            
        }
   /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }







        .navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding:20px;
}

.navbar-logo {
  height: 110px;
  width: 150px; /* Adjust size as needed */
}





        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #333;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: #555;
            border-radius: 5px;
        }


        /* Search Bar Styling */
        .search-container {
            position: relative;
        }

        .search-input {
            padding: 8px 40px 8px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease-in-out;
        }

        .search-button {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }

        .search-input:focus {
            border-color: #007bff;
        }

        .search-button:hover {
            color: #007bff;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-container {
                margin-top: 10px;
                width: 100%;
            }

            .search-input {
                width: 100%;
            }
        }
    * Dropdown container */
        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }



.cart-icon {
  position: relative;
}

.cart-count {
  position: absolute;
  top: -10px;
  right: -10px;
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 5px 10px;
  font-size: 14px;
}

    
  .image-row {
            display: flex;
            justify-content: space-between; /* Adjust spacing between images */
            flex-wrap: wrap; /* Wrap to the next line if the screen is small */
            gap: 10px; /* Optional: add spacing between images */
        }

        .image-row img {
            max-width: 100%;
            height: auto;
            width: 200px; /* Set width for the images, adjust as needed */
            border: 2px solid #ccc; /* Optional: border around images */
        }



        .main-content {
            padding: 2em;
            text-align: center;
        }

        .product {
            margin: 20px;
            display: inline-block;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }


{box-sizing: border-box;}
        .slideshow-container {
            position: relative;
            max-width: 800%;
            margin:auto;
            float:center;
            
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            width:850%;
        }

        .dot {
            height: 5px;
            width: 5px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }













        
        
video {
    position:fixed;
    top:450;
    left:450;
    min-width:150%;
    min-height:150%;
    z-index: -1; /* Ensure the video stays in the background */
}

footer {
  background-color:red;
  color: #fff;
  padding: 20px;
  text-align: center;
}
img{
    width:500px;
  height:300px;
}

footer {
  background-color:blueviolet;
  color: #fff;
  padding: 400px;
  text-align: center;
}

.grid-item {
            text-align:left;
        }

 .foot {
            width: 100%;
                        box-shadow: 0 0 4px grey, 0 0 3px grey;

        }

        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 0%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 0px;
            color:transparent;
            text-align: center;
            background-color: transparent; /* Bootstrap navbar-light background color */
        }

        .footerb {
            width: auto;
            padding: 5%;
            font-size: 20px;
            color: black;
            text-align: center;
            background-color:transparent; /* Match Bootstrap navbar-light background color */
        }

        .footerb a {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        .footerb i {
            background-color:transparent;
            color: #ffffff;
            font-size: 25px;
            width:20px;
            height:px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footerb i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footerb h5 {
            font-size: 30px;
            text-shadow: 0 0 5px gold, 0 0 10px gold;
            color: white;
        }

        .footerb a:hover {
            color: black;
        }

        .footerb #addr:hover {
            color: black;
        }

        .grid-item {
            text-align: center;
        }
        .glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}


   </style> 
</head>
<body>
<video autoplay loop muted playsinline>

    <source src="http://localhost/TY%20projrct/finalpro/img/5192069-hd_1920_1080_30fps.mp4" type="video/mp4">
       
    <!-- Add additional source elements for other video formats like WebM or Ogg -->
    Your browser does not support the video tag.
</video>


<h1 style="font-family: cursive;"><center> </center></h1>

   <!-- Navbar with links and search bar -->
<nav class="navbar">





<nav class="navbar">
  <div class="logo">
     
  <img src="http://localhost/TY%20projrct/finalpro/img/logo.jpg" alt="Your Logo" class="navbar-logo">
      
    </a>
  </div>
  <!-- Other nav items -->
</nav>









    
        <div class="dropdown">
        <button class="dropbtn">Products Categories 🤽‍♀️
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="http://localhost/TY%20projrct/finalpro/inddor.php">Indoor</a>
            <a href="http://localhost/TY%20projrct/finalpro/outdoor.php">Outdoor</a>
            <a href="http://localhost/TY%20projrct/finalpro/gym.php">Fitness & Traning</a>
            <a href="http://localhost/TY%20projrct/finalpro/shoes.php">Footwear</a>
            <a href="http://localhost/TY%20projrct/finalpro/acsry.php">Accessories</a>
            
          

        </div>
    </div> <div class="navbar-links">
        <a href="http://localhost/TY%20projrct/finalpro/aboutus.html">👨‍💼 About </a>
        <a href="http://localhost/TY%20projrct/finalpro/signup.php">Sign in 👩‍💻</a>
        <a href="http://localhost/TY%20projrct/finalpro/roughwork.html">visit 📌</a>
        <a href="http://localhost/TY%20projrct/finalpro/contact.php">Contact 📞</a>
        <a href="http://localhost/TY%20projrct/finalpro/login1.php">Log-in 🧑‍💻</a>
          <a href="http://localhost/TY%20projrct/finalpro/faq.html">FAQ 📩</a>
    </div>
    <a href="cartview.php" class="cart-button">
        <i class="fas fa-shopping-cart cart-icon"></i>
        View Cart  🛒
    </a>




    <!-- Search Bar in Navbar -->
    <div class="search-container">
        <input type="text" id="search-input" class="search-input" placeholder="Search products...">
        <button class="search-button" onclick="searchProduct()">&#128269;</button>
    </div>
</nav>

<script>
    // JavaScript to handle the search function
    function searchProduct() {
        const query = document.getElementById('search-input').value.toLowerCase();

        // Define your product links here (example)
        const products = {
            "indoor": "http://localhost/TY%20projrct/finalpro/inddor.php",
            "outdoor": "http://localhost/TY%20projrct/finalpro/outdoor.php",
          
          
"shoes": "http://localhost/TY%20projrct/finalpro/shoes.php",
"cycle": "http://localhost/TY%20projrct/finalpro/gym.php",


          "gym": "http://localhost/TY%20projrct/finalpro/gym.php",
            

        };


function showSuggestions() {
    const query = document.getElementById("searchBar").value.toLowerCase();
    const suggestions = items.filter(item => item.toLowerCase().includes(query));
    const suggestionsList = document.getElementById("suggestions");
    suggestionsList.innerHTML = suggestions.map(item => `<li>${item}</li>`).join('');
}







const maxResults = 8;
        // Check if the query matches any product
        if (products[query]) {
            // Redirect to the product page
            window.location.href = products[query];
        } else {
            alert("Product not found! Please try again.");
        }
    }

    // You can also trigger the search on Enter key press
    document.getElementById('search-input').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            searchProduct();
        }
    });
</script>


    
   <div class="main-content">
        <h2 style="color:whitesmoke;font-family:monaco;"> <marquee> <mark> VISIT - OUR - STORE - IN - OUR - BARAMATI</h2></mark></marquee>
</b>
<br>




   <div class="main-content">
      
        <center><style type="color:black"></style>OUR BESTSELLERS</center>
        <br>
        <br>
<div class="image-row">

     <a href="http://localhost/TY%20projrct/finalpro/inddor.php"><img src="http://localhost/TY%20projrct/finalpro/img/indoorbc.jpg" alt="Image 3"></a>
 

     <a href="http://localhost/TY%20projrct/finalpro/outdoor.php"> <img src="http://localhost/TY%20projrct/finalpro/img/outdoorbc.jpg" alt="Image 4"></a> 
      <a href="http://localhost/TY%20projrct/finalpro/gym.php"><img src="http://localhost/TY%20projrct/finalpro/img/gymbc1.webp" alt="Image 1"></a>
      <a href="http://localhost/TY%20projrct/finalpro/shoes.php"><img src="http://localhost/TY%20projrct/finalpro/img/shoebc.jpeg" alt="Image 2"></a>
       
     <a href="http://localhost/TY%20projrct/finalpro/acsry.php"> <img src="http://localhost/TY%20projrct/finalpro/img/istockphoto-1419866884-612x612.jpg" alt="Image 4"></a>

     
</div>




</section>
<br>
<br><br>
<section><center>
    <button class="glow-on-hover" onclick="redirectToPage()" style="color: yellow; background-color:blue">SHOP NOW</button>

    <script>
        function redirectToPage() {
            window.location.href = "http://localhost/TY%20projrct/finalpro/shopnow.php";
        }l

   </script>
   </section>
</center>
<br><br><br><br>
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="http://localhost/TY%20projrct/finalpro/img/s3.jpg" alt="Image 1">
    </div>

    <div class="mySlides fade">
        <img src="http://localhost/TY%20projrct/finalpro/img/c6.jpg" alt="Image 2">
    </div>

    <div class="mySlides fade">
        <img src="http://localhost/TY%20projrct/finalpro/img/t8.jpg" alt="Image 3">
    </div>
   
</div>
</div>

<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    let slideIndex = 1;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000);
    }
</script>
    
    <section style="text-align:right;text-shadow: black;color: black;">
            <h4 style="color:whitesmoke;">NOW OPEN IN BARAMATI<br>
                <br>
            sports Pvt Ltd♻️.Subhadra Mall <br>Ground Floor,Shop no:12,Stand Road,B Town<br>
            Baramti-413102
            <br>
<br>
            Store Timings🕧:8AM-11PM
            </h4>
</style>

                <?php
                
            ?>

            <?php
                
             ?>
             
        </section>
    </main>




</body>




<center><b>
<section>
   
    <br>
    <br>


   









</b>
</center></section>


    
      
</b>

</center>
  <div class="foot">
        <div class="footer">

            <div class="footerb grid-item">
                <b><h4 style="color:white;">EXCLUSIVE OFFERS</h4></b>

                <hr class="hr" style="border:1px solid black; border-bottom: white;">
         <a href="http://localhost/TY%20projrct/finalpro/sale.html" style="size:1">👆</a>
                <img src="http://localhost/TY%20projrct/finalpro/img/ofr1.jpg" height="150px" width="240px" loading="lazy">
               <span></span>
            </div>

            <div class="footerb grid-item">
               <b> <h3 style="color:white;">Contact☎️us</h3></b>
                <hr class="hr" style="border:1px solid black;border-bottom: white;">
               <k style= "font-size:15px";color:black;> Whatsapp 
                No :<br>📞*************</k><br>
                <a href="https://api.whatsapp.com/send?phone=***********" target="_blank"
                   rel="noopener noreferrer">
                   <br>
                   <br>
                    <a href="http://localhost/TY%20projrct/finalpro/contact.php" style="color:whitesmoke;font-family: all">Contact here🤙...</a>
                  <br>
                </a>

                <a href="https://myaccount.google.com/" style="text-decoration:none; color:whitesmoke;">
                 <k style= "font-size:15px">   <br><br>Gmail Id📲📨 : <br>

                   ********@gmail.com</a></k><br>

            </div>


            <div class="footerb grid-item">
               <b> <h3 style="color:whitesmoke;">Customer<br>Review</h3></b>
                <hr class="hr" style="border:1px solid black; border-bottom: white;">
               <k style= "font-size:10px"><br> <br> </k><br>
               <section>

<a href="http://localhost/TY%20projrct/finalpro/review.html"><button class="glow-on-hover" type="button">Click to see!</button>

  </a>


   <br>

            </div>

            <div class="footerb grid-item">
                <b><h3 style="color: white;">GRAB HERE🌍</h3>
                <hr class="hr" style="border:1px solid black;border-bottom:black;"> 
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3791.0814357603103!2d74.57758883674283!3d18.16016214027935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc3a010db3a60a5%3A0x65d0efb2cb4f84e5!2sTuljaram%20Chaturchand%20College!5e0!3m2!1shi!2sin!4v1704894866991!5m2!1shi!2sin"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    width="250" height="250">


            </div>

        </div>
    </div>
</footer>

</body>


<?php include_once(""); ?>

</html>
