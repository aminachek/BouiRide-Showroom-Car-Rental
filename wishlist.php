<?php
   include("connection.php");  // Inclut le fichier de connexion à la base de données
   session_start();
   $admin_id = $_SESSION['user_name'] ?? null;   // On récupère l'ID de l'utilisateur connecté dans une variable
   
   if (!isset($admin_id)) {
       header('location:login_page.php');   
   }

   if (isset($_POST['logout'])) {
       session_destroy();       // On détruit toutes les variables de sessions
       header('location:login_page.php');  
   }
   if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $stmt_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
    $stmt_wishlist->bind_param("i", $user_id); // Binding user_id parameter
    $stmt_wishlist->execute();
    $result_wishlist = $stmt_wishlist->get_result();
    $wishlist_num_rows = $result_wishlist->num_rows;
    
    $stmt_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $stmt_cart->bind_param("i", $user_id); // Binding user_id parameter
    $stmt_cart->execute();
    $result_cart = $stmt_cart->get_result();
    $cart_num_rows = $result_cart->num_rows;
} else {
    $wishlist_num_rows = 0;
    $cart_num_rows = 0;
}

    
   
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_image = $_POST["product_image"];
        $product_types_transmission =$_POST["types_de_transmission"];
        $product_Kilometrage = $_POST["Kilometrage"];
        $product_places = $_POST["places"];
        $product_types_motorisation =  $_POST["types_de_motorisation"];

        $product_quantity =1;

       
        $cart_num = mysqli_query($conn,"SELECT * FROM cart WHERE name='$product_name' AND user_id='$user_is' or die('query failed'");
        
        if(mysqli_num_rows($cart_num)>0){
            $message[]='product already exist  in cart';
        }else{
            mysqli_query($conn,"INSERT INTO wishlist (user_id, pid, name, price, image, types_de_transmission, Kilometrage, places, types_de_motorisation) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_types_transmission', '$product_Kilometrage', '$product_places', '$product_types_motorisation')
            ");
            $message[]='product successfully added in wishlist';

        }
    }
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn,"DELETE FROM wishlist  WHERE pid ='$delete_id'") or die ("Query failed");

        header("Location: wishlist.php");
    }
   
    $wishlist_count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM wishlist WHERE user_id = '$user_id'");
    $wishlist_count_result = mysqli_fetch_assoc($wishlist_count_query);
    $wishlist_num_rows = $wishlist_count_result['total'];
    
    // Exécutez une requête SQL pour compter le nombre d'articles dans le panier
    $cart_count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cart WHERE user_id = '$user_id'");
    $cart_count_result = mysqli_fetch_assoc($cart_count_query);
    $cart_num_rows = $cart_count_result['total'];


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bouiride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/css/ionicons.min.css">
    <link rel="website icon" type="png" href="image/logo2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        <?php include 'index.css'; ?>
    </style>
</head>
<body>

<header class="header">
        <div class="flex"></div>
            <a href="index.php" class="logo"><span>Boui</span>Ride</a>

            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="#About">About Us</a>
                <a href="models.php">Models</a>
                <a href="orders.php">Orders</a>
                <a href="#contact">Contact</a>
                <a href="#reviews">Reviews</a>
                
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

        <div class="user-box">
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
    


            <!-- MODELS -->
            <div class="popular-brands ">
            
                <?php 
                if(isset($message)){
                    foreach($message as $message){
                        echo'
                        <div class="message">
                            <span>'.$message.'</span>
                            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                            </div>
                            ';
                    }
                }
                
                ?>
        <section class="wishlist container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde">Your wishlist</h2>
                <?php
                    $grand_total = 0;
                    $select_wishlist = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id='$user_id'") or die('query failed');

                    if (mysqli_num_rows($select_wishlist) > 0) {
                ?>
                    <table class="mt-5 pt-5">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>types of transmission</th>
                        
                        </tr>
                        <?php
                           while ($fetch_wishlist = $result_wishlist->fetch_assoc()) {
                            $grand_total += $fetch_wishlist['price'];
                        ?>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="image/<?php echo $fetch_wishlist['image']; ?>">
                                    <div class="name" name="name"><p><?php echo $fetch_wishlist['name'];?></p></div>
                                    <div class="name" name="name"><p><?php echo $fetch_wishlist['types_de_transmission'];?></p></div>
                                    <div class="name" name="name"><p><?php echo $fetch_wishlist['Kilometrage'];?></p></div>
                                    <div class="name" name="name"><p><?php echo $fetch_wishlist['places'];?></p></div>
                                    <div class="name" name="name"><p><?php echo $fetch_wishlist['types_de_motorisation'];?></p></div>

                                   <a  class= "btn3 "href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" onclick="return confirm('Delete this message?');">Delete</a>

                                </div>
                                
                            </td>
                            <td class="text-center"><small><?php echo $fetch_wishlist['price'];?>DA</small></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                <?php
                    } else {
                        echo '<div class="empty"><p>No products added yet!</p></div>';
                    }
                    if(isset($_GET['delete'])){
                        $delete_id = $_GET['delete'];
                        mysqli_query($conn,"DELETE FROM `wishlist` WHERE id ='$delete_id'") or die ("Query failed");
                        $message[]='user removed successfully';
                        header("Location: wishlist.php");
                    }
                
                ?>
                <div class="wishlist_total">
                    <p>Total amount payable: <span><?php echo $grand_total; ?>DA</span></p>
                    <a href="models.php" class="btn1">Continue shopping</a>
                   
                </div>
        
<script src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="wish.js"></script>
</section>
</div>

        


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




























      <script type="text/javascript" src="admin2.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <!-- Inclure le fichier JavaScript de Bootstrap (optionnel) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </body>
</html>