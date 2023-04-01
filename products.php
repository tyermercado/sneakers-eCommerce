<?php

session_start();

require_once ('productsdb.php');
require_once ('product_component.php');



// create instance of productsdb class
$db = new productsdb("Productsdb", "Productstb");



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GSoles</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="./css/product.css">

</head>
<body>
  <!-- Navigation Bar -->
  <div id="hero">
        <header>
          <a href="#"><img class="logo" src="./img/GSoles.png"></a>
          <nav>
            <ul class="nav">
              <div class="nav__links">
                <a href="index.html" class="nav__item ">
                  <li class="nav__item--underline">Home</li>
                </a>
                <a href="products_user.php" class="nav__item">
                  <li>Products</li>
                </a>
                <a href="#contact" class="nav__item">
                  <li>About</li>
                </a>
                <a href="contact.php" class="nav__item">
                  <li>Contact</li>
                </a>
                <a href="login_choices.html" class="nav__item">
                  <li><i class="fas fa-user"></i></li>
                </a>
                <a href="order_summary.html" class="nav__item nav__item--cart">
                  <li><i class="fas fa-shopping-cart"></i></li> 
                </a>
              </div>
            
              <div class="burger nav__item">
                <span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
              </div>
            </ul> 
          </nav>
        </header>
        <section id="hero-text">
          <h2 class="hero-text__heading"></h2>
        </section>
      </div>
  <!-- End of Nav Bar-->


 
  <!-- Featured Shoes -->
        <section class="featured-products-wrapper">
          <div class="featured-products animate-right">
            <img src="./img/jordan1-removebg-preview.png" alt="Air Jordan 1">
            <h4>Air Jordan 1 Low Craft</h4>
            <p>The Air Jordan 1 Low is a lifestyle sneaker from Brand Jordan, a subsidiary of NIKE, Inc. Debuted in 1985, the model has <br> 
              historically served as a casual take on Michael Jordan's first <br>signature sneaker, the high-top Jordan 1.
            </p>
            <button class="add-to-cart-featured cartBtn"><a href="#items">Shop Now</a></button>
        </section>

  <!-- End of Featured Shoes -->
  
      
  <!-- All Products -->
<div class="container">
<h3 class="shoes__heading" id="allshoes">All Products</h3>
        <div class="row text-center py-5">
            <?php
            // Get layout from product component and database from productsdb
            $result = $db->getData();
            while ($row = mysqli_fetch_assoc($result)){
                product($row['product_id'], $row['product_name'],$row['product_categ'], $row['product_size'],$row['product_price'], $row['product_image']);
            }
            ?>
        </div>
</div>
<!-- Footer -->
<footer>
    <div class="company-info">
      <h5>About</h5>
      <p class="address">The CEO of GoodSoles (known in the market as GSoles), <br> Tyer Leinster G. Mercado, has established 
         this <br> business because of his love for quality shoes. <br> He has been fond of buying and collecting good shoes.<br></p>
      <p class="me">Develop by Tyer Leinster G. Mercado & copy 2022 GSoles, Inc.</p>
    </div>
    <div class="contact" id="contact">
      <h5>Contact</h5>
      <div class="contact-links">
        <a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter icon"></i></a>
        <a href="#" title="Github" target="_blank"><i class="fab fa-github icon"></i></a>
        <a href="#" title="Instagram" target="_blank"><i class="fab fa-instagram icon"></i></a>
      </div>
    </div>
  </footer>




<script src="./js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
