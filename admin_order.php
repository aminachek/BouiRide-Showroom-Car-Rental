<?php
    include("connection.php");
    session_start();
    $admin_id = $_SESSION['admin_name'] ?? null;

    if (!isset($admin_id)) {
        header('location:login_page.php');
        exit;
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:login_page.php');
        exit;
    }

    $message = []; // Initialiser le tableau des messages

    
    //delete products from database
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn,"DELETE FROM `order` WHERE id ='$delete_id'") or die ("Query failed");
        $message[]='order removed successfully';
        header("Location: admin_order.php");
    }

    //updateing payment status

    if(isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_order']; // Utilisez 'update_order' ici car c'est le nom du bouton
    
        // Assurez-vous que $update_payment est correctement dÃ©fini
        if($update_payment == "Update Payment" && isset($_POST['update_payment'])) {
            $update_payment_value = $_POST['update_payment'];
    
            mysqli_query($conn, "UPDATE `order` SET `payment_status` = '$update_payment_value' WHERE `id` = '$order_id'") or die('query failed');
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin pannel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        <?php include 'admin_header.css'; ?>
    </style>
    
</head>
<body>
    <?php include 'admin_header.php' ?>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo'
                <div class="message">
                <span>'.$message.'</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove( )"></i>
                </div>
                ';
            }
        }

?>
    <div class="line4"></div>
<section class="order-container">
    <h1 class="title">Toltal order placed</h1>
    <div class="box-container  ">
        <?php
            $select_order = mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
            if (mysqli_num_rows($select_order) > 0) {
                while ($fetch_order = mysqli_fetch_assoc($select_order)) {
        ?>
        <div class="boxes text-center col-lg-5 col-md-12 col-sm-12">
            <p>User name : <span><?php echo $fetch_order['name']; ?></span></p>
            <p>User id : <span><?php echo $fetch_order['id']; ?></span></p>
            <p>Placed on : <span><?php echo $fetch_order['placed_on']; ?></span></p>
            <p>Number : <span><?php echo $fetch_order['number']; ?></span></p>
            <p>Email : <span><?php echo $fetch_order['email']; ?></span></p>
            <p>Total price : <span><?php echo $fetch_order['total_price']; ?></span></p>
            <p>Method : <span><?php echo $fetch_order['method']; ?></span></p>
            <p>Address : <span><?php echo $fetch_order['address']; ?></span></p>
            <p>Total product : <span><?php echo $fetch_order['total_products']; ?></span></p>
            <form method="POST">
                <input type="hidden" name="order_id" value="<?php echo $fetch_order['id']; ?>"/>
                <select name="update_payment">
                    <option disabled selected><?php echo $fetch_order['payment_status']; ?></option>
                    <option value="pending">Pending</option>
                    <option value="Complete">Complete</option>
                </select>
                <input type="submit" name="update_order" value="Update Payment" class="btn">
                <a href="admin_order.php?delete=<?php echo $fetch_order['id']; ?>" onclick="return confirm('Delete this message?');">Delete</a>

            </form>
        </div>
        <?php
                }
            } else {
                echo '
                <div class="empty">
                    <p>No order placed yet!</p>
                </div>
                ';
            }
        ?>
    </div>
</section>

<div class="line"></div>


    

















    <script type="text/javascript" src="admin2.js"></script>
</body>
</html>