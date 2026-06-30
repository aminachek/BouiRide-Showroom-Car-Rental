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
        mysqli_query($conn,"DELETE FROM `users` WHERE id ='$delete_id'") or die ("Query failed");
        $message[]='user removed successfully';
        header("Location: admin_user.php");
    }

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin pannel</title>
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
<section class="message-container">
    <h1 class="title">Toltal user account</h1>
    <div class="box-container">
        <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            if (mysqli_num_rows($select_users) > 0) {
                while ($fetch_users = mysqli_fetch_assoc($select_users)) {
        ?>
 <div class="boxes text-center col-lg-5 col-md-12 col-sm-12">            <p>User ID: <span><?php echo $fetch_users['id']; ?></span></p>
            <p>Name: <span><?php echo $fetch_users['username']; ?></span></p>
            <p>Email: <span><?php echo $fetch_users['email']; ?></span></p>
            <p>User type: <span style=" color: <?php if($fetch_users['user_type']==  'admin'){ echo 'orange';};?>"><?php echo $fetch_users['user_type']; ?><span></p>
            <a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete this message?');">Delete</a>
        </div>
        <?php
                }
            } else {
                echo '
                <div class="empty">
                    <p>No messages yet!</p>
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
