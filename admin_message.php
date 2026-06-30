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
        mysqli_query($conn,"DELETE FROM `message` WHERE id ='$delete_id'") or die ("Query failed");

        header("Location: admin_message.php");
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
    <h1 class="title">Unread message</h1>
    <div class="box-container">
        <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {
        ?>
        <div class="boxes text-center col-lg-5 col-md-12 col-sm-12">
                <p>User ID: <span><?php echo $fetch_message['id']; ?></span></p>
            <p>Name: <span><?php echo $fetch_message['name']; ?></span></p>
            <p>Email: <span><?php echo $fetch_message['email']; ?></span></p>
            <p>Message: <?php echo $fetch_message['message']; ?></p>
            <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Delete this message?');">Delete</a>
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