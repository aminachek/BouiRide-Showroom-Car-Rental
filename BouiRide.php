                            <!--Laoubi Sara Sabrine && Chekroune Amina -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="BouiRide.css">

    <title>Bouiride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/css/ionicons.min.css">

    <link rel="website icon" type="png" href="image/logo2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.1/css/ionicons.min.css">

    <style type="text/css">
        <?php include 'BouiRide.css'; ?>
    </style>
</head>

<body>

    <header>
        <a href="BouiRide.php" class="logo">BouiRide</a>

            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="#About">About Us</a>
                <a href="models.php">Models</a>
                <a href="#contact">Contact</a>
                <a href="#reviews">Reviews</a>
                
            </nav> 

        <div class="btn-icon">
            <a class="nav-btn" href="login_page.php"><i class="fa-solid fa-user" id="user-btn"></i></a>
        </div>
        
            
    </header>

    <section class="main">

    <div>
        <div class="banner">
            <video loop autoplay muted>
                <source src="video/bouiride.mp4" type="video/mp4">
            </video>
        </div>
        <div class="content">
            <h1>Just Drive,<br> We will do the rest</h1>
            <button type="button" class="btn"><a href="login_page.php">Discover</a></button>
        </div>
    </div>

    </section>
    

                                             <!-------------------------------------
                                                            ABOUT
                                            ------------------------------------->
    <section class="about" id="About">
    <div class="heading">
            <span>ABOUT US</span>
            <h1>Who We Are</h1>
        </div>
    </div>

        
        <div class="about-content">
            <div class="about-img">
                <img src="image/About.png" alt="About">
            </div>
        
            <div class="about-text">
                <p><span>BouiRide</span> established in 2023, is your premier destination for purchasing and renting high-quality
                vehicles. We offer a carefullyinspected selection of vehicles for sale and a flexible rental service with an easy
                online payment system. Our dedicated team is committed to providing excellent customer service and ensuring your
                satisfaction.For any inquiries or to schedule an appointment, please feel free to contact us. We look forward to 
                adding you to our list of satisfied customers.</p>
                <button class="btn-About"><a href="login_page.php">Contact Us </a></button>
            </div>
        </div>
    </section>
             <!-------------------------------------
                                                            SERVICES
                                            ------------------------------------->
                                            <section class="services">
    <div class="line"></div>
        <div class="heading">
        <div class="titre">
                <span>S E R V I C E S </span>
                <h1> Our BENEFITS</h1>
                </div>
                </div>
            <div class="row mx-auto container-fluid">
                <div class="box align-center col-lg-4 col-md-12 col-sm-12">
                        <img src="image/shipping_.png " alt="" />
                        <div>
                            <h1>Fast & Free Shipping</h1>
                            <p>Fast and free shipping on all orders within Bouira. Take advantage of our express delivery service to get your items in record time.</p>
                        </div>
                </div>

                <div class="box  col-lg-4 col-md-12 col-sm-12">
                    <img src="image/moneybag_.png "alt="">
                    <div>
                        <h1>Money Back & Guarantee</h1>
                        <p>We offer a full money-back guarantee on all products. If you're not satisfied, we'll refund you in full, no questions asked.</p>
                    </div>
                </div>

                <div class="box  col-lg-4 col-md-12 col-sm-12">
                    <img src="image/customer-support_.png" alt="">
                    <div>
                        <h1>Online Support 24/7</h1>
                        <p>Our customer support team is available 24/7 to answer any questions and provide the assistance you need.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>







                                            

                                            <!-------------------------------------
                                                            models
                                            ------------------------------------->

                                            <section class="models" >
            <div class="heading">
                    <span>M O D E l S</span>
                    <h1>Our Poular Cars</h1>
                </div>
                </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <!-- Carte 1 -->
                            <img src="car_image/image1.jpg" class="img-fluid mb-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Audi Q5</h5>
                                
                                <!-- Features -->
                                <div class="features mb-2">
                                    <span><ion-icon name="hardware-chip-outline"></ion-icon>Automatic</span>
                                    <span><ion-icon name="speedometer-outline"></ion-icon>10.15km</span>
                                    <span><ion-icon name="people-outline"></ion-icon>4 People</span>
                                    <span><ion-icon name="flash-outline"></ion-icon>Hybrid</span>
                                </div>
                                <hr class="separator">

                                <!-- Price -->
                                <div class="price mb-2">
                                    <p>450.000.000da</p>
                                    
                                    <!-- Wishlist and Cart Icons -->
                                    <a href="wishlist.php" class="text-decoration-none mr-2"><i class="fa-solid fa-heart"></i></a>
                                    <a href="cart.php" class="text-decoration-none mr-2"><i class="fa-solid fa-cart-shopping"></i></a>
                                    
                                    <!-- Details Button -->
                                    <a href="detail.php" class="text-decoration-none mr-2"><i class="fa-regular fa-eye"></i></a>
                                </div>
                                
                            </div>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <!-- Carte 1 -->
                            <img src="car_image/image2.jpg" class="img-fluid mb-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Audi Q5</h5>
                                
                                <!-- Features -->
                                <div class="features mb-2">
                                    <span><ion-icon name="hardware-chip-outline"></ion-icon>Automatic</span>
                                    <span><ion-icon name="speedometer-outline"></ion-icon>10.15km</span>
                                    <span><ion-icon name="people-outline"></ion-icon>4 People</span>
                                    <span><ion-icon name="flash-outline"></ion-icon>Hybrid</span>
                                </div>
                                <hr class="separator">

                                <!-- Price -->
                                <div class="price mb-2">
                                    <p>450.000.000da</p>
                                    
                                    <!-- Wishlist and Cart Icons -->
                                    <a href="wishlist.php" class="text-decoration-none mr-2"><i class="fa-solid fa-heart"></i></a>
                                    <a href="cart.php" class="text-decoration-none mr-2"><i class="fa-solid fa-cart-shopping"></i></a>
                                    
                                    <!-- Details Button -->
                                    <a href="detail.php" class="text-decoration-none mr-2"><i class="fa-regular fa-eye"></i></a>
                                </div>
                                
                            </div>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <!-- Carte 1 -->
                            <img src="car_image/image3.jpg" class="img-fluid mb-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Audi Q5</h5>
                                
                                <!-- Features -->
                                <div class="features mb-2">
                                    <span><ion-icon name="hardware-chip-outline"></ion-icon>Automatic</span>
                                    <span><ion-icon name="speedometer-outline"></ion-icon>10.15km</span>
                                    <span><ion-icon name="people-outline"></ion-icon>4 People</span>
                                    <span><ion-icon name="flash-outline"></ion-icon>Hybrid</span>
                                </div>
                                <hr class="separator">

                                <!-- Price -->
                                <div class="price mb-2">
                                    <p>450.000.000da</p>
                                    
                                    <!-- Wishlist and Cart Icons -->
                                    <a href="wishlist.php" class="text-decoration-none mr-2"><i class="fa-solid fa-heart"></i></a>
                                    <a href="cart.php" class="text-decoration-none mr-2"><i class="fa-solid fa-cart-shopping"></i></a>
                                    
                                    <!-- Details Button -->
                                    <a href="detail.php" class="text-decoration-none mr-2"><i class="fa-regular fa-eye"></i></a>
                                </div>
                                
                            </div>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <!-- Carte 1 -->
                            <img src="car_image/image1.jpg" class="img-fluid mb-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Audi Q5</h5>
                                
                                <!-- Features -->
                                <div class="features mb-2">
                                    <span><ion-icon name="hardware-chip-outline"></ion-icon>Automatic</span>
                                    <span><ion-icon name="speedometer-outline"></ion-icon>10.15km</span>
                                    <span><ion-icon name="people-outline"></ion-icon>4 People</span>
                                    <span><ion-icon name="flash-outline"></ion-icon>Hybrid</span>
                                </div>
                                <hr class="separator">

                                <!-- Price -->
                                <div class="price mb-2">
                                    <p>450.000.000da</p>
                                    
                                    <!-- Wishlist and Cart Icons -->
                                    <a href="wishlist.php" class="text-decoration-none mr-2"><i class="fa-solid fa-heart"></i></a>
                                    <a href="cart.php" class="text-decoration-none mr-2"><i class="fa-solid fa-cart-shopping"></i></a>
                                    
                                    <!-- Details Button -->
                                    <a href="detail.php" class="text-decoration-none mr-2"><i class="fa-regular fa-eye"></i></a>
                                </div>
                                
                            </div>
            </div>
        </div>     
        <div class="btn-container">
                <button type="button" class="load"><a href="login_page.php">Discover More</a></button>
                </div>   
            </section>
            
            <script src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>



                                            <!-------------------------------------
                                                            CONTACT
                                            ------------------------------------->
    <section class="contact" id="contact">
    <div class="heading">
            <span>CONTACT</span>
            <h1> Get In Touch</h1>            
        </div>
    </div>

        <div class="contact-content">
        <div class="box">
            <div class="contact form">
                    <h3>Send a Message</h3>
                <form method="POST" action="contact.php">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span> Name</span>
                                <input type="text" placeholder=" Name" name="name">
                            </div>
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea placeholder="Write your message here..." name="message"></textarea>
                            </div>
                        </div>
                        
                        <div class="button-area">
                        
                                <input type="submit" value="send">
                                <span class="span-m"></span>
                            
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
            
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3215.5360818757654!2d3.6653678751187577!3d36.29930487239412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e9c0407b5dc8d%3A0x5e7e5526f684907c!2sAin%20Bessem%2C%20A%C3%AFn%20Bessem!5e0!3m2!1sfr!2sdz!4v1712055994784!5m2!1sfr!2sdz"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        </div>

    </section>


                                           <!-------------------------------------
                                                            REVIEWS
                                            ------------------------------------->

        <section class="reviews" id="reviews">
            <div class="heading">
                <span>Reviews</span>
                <h1>What Clients Say</h1>
            </div>
                <div class="reviews-container">
                    <div class="boxx">
                        <div class="rev-img">
                            <img src="client_image/image4(1).jpg" alt="">
                        </div>
                        <h2>Laoubi Chemseddine</h2>
                        <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere nesciunt perferendis at sapiente omnis repella</p>

                    </div>

                    <div class="boxx">
                        <div class="rev-img">
                            <img src="client_image/image5.jpg" alt="">
                        </div>
                        <h2>Chekroune Houcine</h2>
                        <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere nesciunt perferendis at sapiente omnis repella</p>

                    </div>

                    <div class="boxx">
                        <div class="rev-img">
                            <img src="client_image/image6.jpg"alt="">
                        </div>
                        <h2>Louafi Lynda</h2>
                        <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere nesciunt perferendis at sapiente omnis repella</p>
                    </div>
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





























      <script type="text/javascript" src="BouiRide.js"></script>
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
