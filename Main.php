<?php

@include 'Connection.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:Login.php');
}

?>



<html>
<head>
    <title>Cake Shop</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

     <section>

     <nav>

     <div class="logo">
        <img src="Images/logo2.png">
        <span>Cake Shop</span>
     </div>

       <ul>
        <li><a href="Main.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li><a href="Menu.php">Menu</a></li>
        <li><a href="Gallary.php">Gallary</a></li>
        <li><a href="Review.php">Review</a></li>
        <li><a href="Order.php">Order</a></li>
       </ul>


        <div class="icon">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-heart"></i>
            <i class="fa-solid fa-cart-shopping"></i>
        </div>

       <div class="logout-btn">
       <span><?php echo $_SESSION['user_name'] ?></span>
       <a href="Logout.php">Log Out</a>
       </div>

         </nav>


         <!--main section-->
    <div class="main">
        <div class="main-text">
           <h1>Get Fresh<span>Cake</span><br>In A Easy Way</h1>
        </div>
   
        <div class="main-img">
           <img src="Images/cake1.avif" alt="">
        </div>
     
       </div>
   
   <!--2 main -->
   
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea nisi saepe
        earum ad numquam dicta, facilis delectus laboriosam sint esse doloribus magni. 
           Repudiandae pariatur aspernatur, iusto repellat soluta nulla et?</p>
   
           <div class="main-btn">
               <a href="Order.php">Order Now</a>
               <i class="fa-solid fa-angle-right"></i> 
   
           </div>
   
        </section>


    <!--Footer-->

<footer>

    <div class="footer-main">
    
       <div class="footer-tag">
    
          <h2>location</h2>
        
           <p>Sri Lanka</p>
           <p>USA</p>
           <p>India</p>
           <p>Japan</p>
           <p>Italy</p>
           
          </div>
 
          <div class="footer-tag">
    
             <h2>Quick Link</h2>
           
              <p>Home</p>
              <p>About</p>
              <p>Menu</p>
              <p>Gallary</p>
              <p>Order</p>
              
             </div>
 
             <div class="footer-tag">
    
                <h2>Contact</h2>
              
                 <p>+94 12345 78694</p>
                 <p>+94 25378 29883</p>
                 <p>jhondeo132@gamil.com</p>
                 <p>foodshop123@gmail.com</p>
                
                  </div>
 
                <div class="footer-tag">
    
                   <h2>Our Service</h2>
                 
                    <p>Fast Delivery</p>
                    <p>Easy Payment</p>
                    <p>24 x 7 Service</p>
                    
                   </div>
                    
                   <div class="footer-tag">
    
                      <h2>Follows</h2>
                    
                      <i class="fa-brands fa-facebook-f"></i>
                      <i class="fa-brands fa-twitter"></i>
                      <i class="fa-brands fa-instagram"></i>
                      <i class="fa-brands fa-linkedin"></i>
                       
                      </div>   
 
     </div>
    
    <p1 class="end">Design by<span><i class="fa-solid fa-face-grin-wide"></i>Ronit Patel</span></p1>
    
  </footer>

</body>
</html>