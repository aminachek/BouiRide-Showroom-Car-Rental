<?php
include("connection.php");
session_start();
$admin_id = $_SESSION['user_name'] ?? null;

if (!isset($admin_id)) {
    header('location:login_page.php');   
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login_page.php');  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouiride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/css/ionicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="admin2.css">
    <link rel="website icon" type="png" href="image/logo2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"rel="stylesheet">
</head>
<body>
    <section class="popular-brands">
        <h2>Popular Brands</h2>
        <div class="control">
            <i class="bi bi-chevron-left left"></i>
            <i class="bi bi-chevron-right right"></i>
        </div>
        <div class="popular-brands-content">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM products ") or die('Error in Selecting');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
                    <div class="product-container">
                        <form class="card-home" method="POST">
                            <div class="product-row">
                                <div class="product">
                                    <img src="image/<?php echo $fetch_products['image']; ?>">
                                    <div class="card-body">
                                        <div class="name text-center"><?php echo $fetch_products['name']; ?></div>
                                        <div class="features mb-2 text-center">
                                            <span class="types_transmission"><ion-icon name="hardware-chip-outline"></ion-icon><?php echo $fetch_products['types de transmission']; ?></span>
                                            <span class="Kilometrage"><ion-icon name="speedometer-outline"></ion-icon><?php echo $fetch_products['Kilometrage']; ?></span>
                                            <span class="places"><ion-icon name="people-outline"></ion-icon><?php echo $fetch_products['places']; ?></span>
                                            <span class="types_motorisation"><ion-icon name="flash-outline"></ion-icon><?php echo $fetch_products['types de motorisation']; ?></span>
                                        </div>
                                        <hr class="separator">
                                        <div class="price text-center"><?php echo $fetch_products['price']; ?>DA</div>
                                        <div class="icon mb-2 text-center">
                                            <a href="wishlist.php" class="text-decoration-none mr-2"><ion-icon name="heart"></ion-icon></a>
                                            <a href="cart.php" class="text-decoration-none mr-2"><ion-icon name="cart"></ion-icon></a>
                                            <a href="detail.php?pid=<?php echo $fetch_products['id']; ?>" class="text-decoration-none mr-2"><ion-icon name="eye"></ion-icon></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '
                    <div class="empty">
                        <p>No products added yet!</p>
                    </div>
                ';
            }
            ?>
        </div>
    </section>

    <script src="admin2.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>
</html>
