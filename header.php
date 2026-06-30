<?php
include 'connection.php'; // Include your database connection file

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
    $stmt_wishlist->bind_param("i", $user_id);
    $stmt_wishlist->execute();
    $result_wishlist = $stmt_wishlist->get_result();
    $wishlist_num_rows = $result_wishlist->num_rows;

    $stmt_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $stmt_cart->bind_param("i", $user_id);
    $stmt_cart->execute();
    $result_cart = $stmt_cart->get_result();
    $cart_num_rows = $result_cart->num_rows;
} else {
    $wishlist_num_rows = 0;
    $cart_num_rows = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bouiride</title>
    <link rel="website icon" type="png" href="image/logo2.png">
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
            
            <a href="wishlist.php"><i class="fa-solid fa-heart"></i><sup><?php echo $wishlist_num_rows ;?></sup></a>
            
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

    

    <section class="main">
        <div class="banner">
            <video loop autoplay muted>
                <source src="video/bouiride.mp4" type="video/mp4">
            </video>
            <div class="content">
            <h1>Just Drive,<br> We will do the rest</h1>
            <button type="button" class="btn"><a href="models.php">Discover</a></button>
        </div>
        </div>
    </section>

</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>




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
