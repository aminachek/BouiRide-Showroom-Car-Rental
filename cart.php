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
            <a href="wishlist.php"><i class="fa-solid fa-heart"></i></a>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
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
    
                        

                                                    <!-------------------------------------
                                                                    Cart
                                                    ------------------------------------->
        <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde">Your Cart</h2>
                <hr>
            </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="images/image1.jpg" alt="">
                            <div>
                                <p>Audi Q3</p>
                                <small>450M  <span>DA</span></small>
                                <br>
                                <a href="#" class="remove-btn">Remove</i></a>
                            </div>
                        </div>
                    </td>

                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-btn" >Edit</a>
                    </td>

                    <td>
                        <span>450M</span>
                        <span class="product-price">DA</span>

                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="images/image1.jpg" alt="">
                            <div>
                                <p>Audi Q3</p>
                                <small>450M  <span>DA</span></small>
                                <br>
                                <a href="#" class="remove-btn">Remove</i></a>
                            </div>
                        </div>
                    </td>

                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-btn" >Edit</a>
                    </td>

                    <td>
                        <span>450M</span>
                        <span class="product-price">DA</span>

                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="images/image1.jpg" alt="">
                            <div>
                                <p>Audi Q3</p>
                                <small>450M  <span>DA</span></small>
                                <br>
                                <a href="#" class="remove-btn">Remove</i></a>
                            </div>
                        </div>
                    </td>

                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-btn" >Edit</a>
                    </td>

                    <td>
                        <span>450M</span>
                        <span class="product-price">DA</span>

                    </td>
                </tr>
            </table>
                
            <div class="cart-total">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>450M DA</td>
                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>450M DA</td>
                    </tr>

                </table>
            </div>

            <div class="checkout-container">
                <button class="btn checkout-btn">checkout</button>

            </div>











        </section>

























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



































    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>