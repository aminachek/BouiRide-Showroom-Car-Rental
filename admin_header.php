<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
    <link rel="stylesheet" href="admin_header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bouiride</title>
    <link rel="website icon" type="png" href="image/logo2.png">
</head>


<body>

    <header class="header">
        <div class="flex"></div>
        <a href="admin_pannel.php" class="logo">BouiRide</a>

            <nav class="navbar">
                <a href="admin_pannel.php">Home</a>
                <a href="admin_user.php">Users</a>
                <a href="admin_product.php">Products</a>
                <a href="admin_models.php">models</a>
                <a href="admin_order.php">Orders</a>
                <a href="admin_message.php">Messages</a>
                
            </nav> 

        <div class="icons">
            <i class="fa-regular fa-user" id="user-btn"></i>
            <i class="fa-solid fa-bars" id="menu-btn"></i>
        </div>

        <div class="user-box">
            <?php 
                if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_email'])): 
            ?>
            <p>Username : <span>
                <?php 
                    echo $_SESSION['admin_name']; 
                ?>
            </span></p>
            <p>Email : <span>
                <?php 
                    echo $_SESSION['admin_email']; 
                ?>
            </span></p>
            <?php endif; ?>

            <form method="post">
                <button type="submit" class="logout-btn" name="logout">log out</button>
            </form>

        </div>
    </header>

    <div class="banner">
    <div class="detail">
        <h1>Admin&nbsp;Dashboard</h1>
        <p>Accédez&nbsp;aux&nbsp;statistiques,&nbsp;gestion&nbsp;des&nbsp;commandes,&nbsp;utilisateurs&nbsp;et&nbsp;messages&nbsp;en&nbsp;un&nbsp;clic.
            &nbsp;Visualisez&nbsp;et&nbsp;gérez&nbsp;l'activité&nbsp;de&nbsp;votre&nbsp;site&nbsp;avec&nbsp;efficacité&nbsp;
        et&nbsp;simplicité.</p>    </div>
     
</div>

</div>











    </body>
</html>