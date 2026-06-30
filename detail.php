<?php
   include("connection.php");  // Inclut le fichier de connexion à la base de données
   session_start();
   $admin_id = $_SESSION['user_name'] ?? null;   // On récupère l'ID de l'utilisateur connecté dans une variable
   $user_id = $_SESSION['user_id'] ?? null;  // On récupère l'ID de l'utilisateur connecté

   if (!isset($admin_id)) {
       header('location:login_page.php');   
   }

   if (isset($_POST['logout'])) {
       session_destroy();       // On détruit toutes les variables de sessions
       header('location:login_page.php');  
   }
    
     //ading product in wishlist
     if(isset($_POST['add_to_wishlist'])){
        $model_id = $_POST["model_id"];
        $model_name = $_POST["model_name"];
        $model_price = $_POST["model_price"];
        $model_image = $_POST["model_image"];
    
        $wislist_number = mysqli_query($conn,"SELECT * FROM wishlist WHERE name='$model_name' AND user_id='$user_id'") or die('query failed');
        $cart_num = mysqli_query($conn,"SELECT * FROM cart WHERE name='$model_name' AND user_id='$model_id'") or die('query failed');
        
        if(mysqli_num_rows($wislist_number) > 0){
            $message[] = 'product already exist  in wishlist';
        } else if(mysqli_num_rows($cart_num) > 0){
            $message[] = 'product already exist  in cart';
        } else {
            mysqli_query($conn,"INSERT INTO wishlist(user_id, pid, name, price, image) VALUES('$user_id','$model_id','$model_name','$model_price','$model_image')") or die('query failed');
            $message[] = 'product successfully added in wishlist';
        }
    }
    //ading product in cart
    if(isset($_POST['add_to_cart'])){
        $model_id = $_POST["model_id"];
        $model_name = $_POST["model_name"];
        $model_price = $_POST["model_price"];
        $model_image = $_POST["model_image"];
        $model_quantity = $_POST["model_quantity"];

    
        $cart_num = mysqli_query($conn,"SELECT * FROM cart WHERE name='$model_name' AND user_id='$user_id'") or die('query failed');
        
        if(mysqli_num_rows($cart_num) > 0){
            $message[] = 'product already exist  in cart';
        } else {
            mysqli_query($conn,"INSERT INTO cart(user_id,pid,name,price,quantity,image) VALUES('$user_id','$model_id','$model_name','$model_price','$model_quantity','$model_image')") or die('query failed');
            $message[] = 'product successfully added in cart';
        }
    }

//use search section
if(isset($_POST['search'])){
    
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Debugging: Output the values to check
    echo "Category: " . $category . "<br>";
    echo "Price: " . $price . "<br>";

    // Simple SQL query to check
    $query = "SELECT * FROM models WHERE model_category='$category' AND price<=$price";
    $result = mysqli_query($conn, $query);

    // Debugging: Output the number of rows fetched
    echo "Number of models: " . mysqli_num_rows($result) . "<br>";

    if(mysqli_num_rows($result) > 0){
        $models = $result;
    } else {
        $models = [];  // Initialize $models as an empty array when no products are found
        echo "No products found.";
    }

} else {
    $stmt = $conn->prepare("SELECT * FROM models ");
    $stmt->execute();
    $products = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
   
    <link rel="stylesheet" href="details.css">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bouiride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/css/ionicons.min.css">

    <link rel="website icon" type="png" href="image/logo2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   

</head>


<body>
    

<header class="header fixed-top">
    <div class="flex">
        <a href="index.php" class="logo"><span>Boui</span>Ride</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php">About Us</a>
            <a href="models.php">Models</a>
            <a href="orders.php">Orders</a>
            <a href="index.php">Contact</a>
            <a href="index.php">Reviews</a>
        </nav> 

        <div class="icons">
            <i class="fa-solid fa-user" id="user-btn"></i>
            <?php 
                $select_wishlist = mysqli_query($conn,"SELECT * FROM wishlist WHERE user_id='$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist);

            ?>
            <a href="wishlist.php"><i class="fa-solid fa-heart"></i><sup><?php echo $wishlist_num_rows ;?></sup></a>
            <?php 
                $select_cart = mysqli_query($conn,"SELECT * FROM cart WHERE user_id='$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart);
            ?>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php echo $cart_num_rows ;?></sup></a>
            <i class="fa-solid fa-bars" id="menu-btn"></i>
        </div>
    </div><div class="user-box">
            <?php 
                if(isset($_SESSION['user_name']) && isset($_SESSION['user_email'])): 
            ?>
            <p>Username : <span>
                <?php 
                    echo $_SESSION['user_name']; 
                ?>
            </span></p>
            <p>Email : <span>
                <?php 
                    echo $_SESSION['user_email']; 
                ?>
            </span></p>
            <?php endif; ?>

            <form method="post">
                <button type="submit" class="logout-btn" name="logout">logout</button>
            </form>

        </div>
    </header>
   
    <section class="popular-brands">
    <div class="heading">
           
                <h1>Details</h1>
            </div>
    </div>
        <div class="control">
            <i class="bi bi-chevron-left left"></i>
            <i class="bi bi-chevron-right right"></i>
        </div>
        <div class="popular-brands-content">
            <?php
                 if(isset($_GET['pid'])){
                         $pid = $_GET['pid'];
                         $select_products = mysqli_query($conn,"select * from products WHERE id = '$pid' ") or die('query failed');
                         if(mysqli_num_rows($select_products)){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){

                           
            ?>
                    <div class="product-container">
                        <form class="card" method="POST">
                            <div class="product-row">
                                <div class="product">
                                    <img src="image/<?php echo $fetch_products['image']; ?>">
                                    <div class="card-body">
                                        <div class="name text-center"><?php echo $fetch_products['name']; ?></div>
                                        <div class="name text-center"><?php echo $fetch_products['product_detail']; ?></div>
                                        
                                       
                                        <div class="price text-center"><?php echo $fetch_products['price']; ?>DA</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                   
            <?php

                            
                        }
                    }
                }
            ?>
        </div>
        <?php
                 if(isset($_GET['pid'])){
                         $pid = $_GET['pid'];
                         $select_models = mysqli_query($conn,"select * from models WHERE id = '$pid' ") or die('query failed');
                         if(mysqli_num_rows($select_models)){
                            while($fetch_models = mysqli_fetch_assoc($select_models)){

                           
            ?>
        <div class="product-container">
                <form class="card-home" method="POST">
                    <div class="product-row">
                        <div class="product">
                            <img src="image/<?php echo $fetch_models['image']; ?>">
                            <div class="card-body">
                                <div class="name text-center"><?php echo $fetch_models['name']; ?></div>
                                <div class="features mb-2 text-center">
                                    <span class="types_transmission"><ion-icon name="hardware-chip-outline"></ion-icon><?php echo $fetch_models['types_de_transmission']; ?></span>
                                    <span class="Kilometrage"><ion-icon name="speedometer-outline"></ion-icon><?php echo $fetch_models['Kilometrage']; ?>KM</span>
                                    <span class="places"><ion-icon name="people-outline"></ion-icon><?php echo $fetch_models['places']; ?>people</span>
                                    <span class="types_motorisation"><ion-icon name="flash-outline"></ion-icon><?php echo $fetch_models['types_de_motorisation']; ?></span>
                                </div>
                                
                                <div class="price text-center"><?php echo $fetch_models['price']; ?>DA</div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php

                            
                }
            }
        }
?>
   


    </section>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>












<!-------------------------------------
                                                                    footer
                                                    ------------------------------------->
      


    <div class="pg-footer">
        <footer class="footer">
          <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
            <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
          </svg>
          <div class="footer-content">
            <div class="footer-content-column">
              <div class="single-footer">
                <h4> <a href="page.html" class="logo">BouiRide</a></h4>
                <p>kiokikfpomkf kofpeokf kofcpeoflpez,ojgv okfep^lf</p>
                <div class="footer-social">
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""> <i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
             
            </div>
            <div class="footer-content-column">
             
              <div class="single-footer">
                <h4> Links</h4>
                <ul>
                    <li><a href="#home"><i class="fa-solid fa-chevron-right"></i>home</a></li>
                    <li><a href="#models"><i class="fa-solid fa-chevron-right"></i>models</a></li>
                    <li><a href="#contact"><i class="fa-solid fa-chevron-right"></i>contact</a></li>
                    <li><a href="#About"><i class="fa-solid fa-chevron-right"></i>About</a></li>
                    <li><a href="#Reviews"><i class="fa-solid fa-chevron-right"></i>Reviews</a></li>
                </ul>
            </div>
            </div>

            <div class="footer-content-column">
              <div class="single-footer">
                <h4> Contact Us</h4>
                <ul>
                    <li><a href=""><i class="fa-solid fa-location-dot"></i>Algeria,Bouira,Amar khoja</a></li>
                    <li><a href=""><i class="fa-solid fa-mobile-screen-button"></i>+213 0656602085</a></li>
                    <li><a href=""><i class="fa-regular fa-envelope"></i>bouiride.10@gmail.com</a></li>
                    
                </ul>
            </div>
            </div>

            <div class="footer-content-column">
              <div class="single-footer">
                <h4> Service</h4>
                <ul>
                    <li><a href=""><i class="fa-solid fa-chevron-right"></i>free Shipping Fast</a></li>
                    <li><a href=""><i class="fa-solid fa-chevron-right"></i> Money Back Guarantee</a></li>
                    <li><a href=""><i class="fa-solid fa-chevron-right"></i>Online Support24/7</a></li>
                    
                </ul>
            </div>
            </div>

            
          </div>
          <div class="footer-copyright">
            <div class="footer-copyright-wrapper">
              <p class="footer-copyright-text">
                <a class="footer-copyright-link" href="#" target="_self"> ©2024. | BouiRide | All rights reserved. </a>
              </p>
            </div>
          </div>
        </footer>
      </div>




























      <script type="text/javascript" src="admin3.js"></script>
      <script type="text/javascript" src="admin2.js"></script>
      

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <!-- Inclure le fichier JavaScript de Bootstrap (optionnel) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        if (window.scrollY > 0) { // Adjust the scroll position threshold as needed
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });
</script>


    </body>
</html>