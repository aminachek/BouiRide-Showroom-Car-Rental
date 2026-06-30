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

    if (isset($_POST["add_product"])) { // Correction du nom du bouton
        $product_name = mysqli_real_escape_string($conn, $_POST["name"]);
        $product_price = mysqli_real_escape_string($conn, $_POST["price"]);
        $product_detail = mysqli_real_escape_string($conn, $_POST["detail"]);
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size']; // Correction du nom de la variable
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'image/' . $image_name;
        $product_types_transmission = mysqli_real_escape_string($conn, $_POST["types_de_transmission"]);
        $product_Kilometrage = mysqli_real_escape_string($conn, $_POST["Kilometrage"]);
        $product_places = mysqli_real_escape_string($conn, $_POST["places"]);
        $product_types_motorisation = mysqli_real_escape_string($conn, $_POST["types_de_motorisation"]);

        $select_product_name = mysqli_query($conn, "SELECT * FROM models WHERE name ='$product_name'") or die('query failed');
        
        if (mysqli_num_rows($select_product_name) > 0) {
            $message[] = 'Product name already exists';
        } else {
            if ($image_size > 2000000) {
                $message[] = 'Image size too large';
            } else {
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    $insert_product = mysqli_query($conn, "INSERT INTO models( `name`, `product_detail`, `price`, `image`, `types_de_transmission`, `Kilometrage`, `places`, `types_de_motorisation`) 
                    VALUES ('$product_name','$product_detail','$product_price','$image_name', '$product_types_transmission ',' $product_Kilometrage', '$product_places','$product_types_motorisation')") or die(mysqli_error($conn));

                    if ($insert_product) {
                        $message[] = "Product added successfully";
                    } else {
                        $message[] = 'Failed to add product';
                    }
                } else {
                    $message[] = 'Failed to upload image. Error: ' . $_FILES['image']['error'];
                }
            }
        }
    }
    //delete products from database
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $select_delete_image = mysqli_query($conn,"SELECT image FROM models WHERE id = '$delete_id'") or die('query failed') ;
        $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
        unlink('image/'.$fetch_delete_image['image']);

        mysqli_query($conn,"DELETE FROM models  WHERE id ='$delete_id'") or die ("Query failed");
        mysqli_query($conn,"DELETE FROM cart  WHERE pid ='$delete_id'") or die ("Query failed");
        mysqli_query($conn,"DELETE FROM wishlist  WHERE pid ='$delete_id'") or die ("Query failed");

        header("Location: admin_models.php");
    }

    // update product
    if(isset ($_POST["update_product"])) {
        $update_id = $_POST[ 'update_id'];
        $update_name = $_POST[ 'update_name' ];
        $update_price = $_POST[ 'update_price' ];
        $update_detail = $_POST[ 'update_detail' ];
        $update_image = $_FILES[ 'update_image' ] [ 'name' ];
        $update_image_tmp_name = $_FILES[ 'update_image'] ['tmp_name'];
        $update_image_folder='images/cars/'.$update_image;
        $update_types_transmission= $_POST[ 'update_types_transmission'];
        $update_Kilometrage= $_POST[ 'update_Kilometrage'];
        $update_places= $_POST[ 'update_places'];
        $update_types_motorisation= $_POST[ 'update_types_motorisation'];

        $update_query = mysqli_query($conn,"UPDATE models SET id ='$update_id',name ='$update_name', product_detail ='$update_detail',price='$update_price', image ='$update_image' , types_de_transmission=' $update_types_transmission',Kilometrage =' $update_Kilometrage',places=' $update_places', types_de_motorisation='$update_types_motorisation' WHERE id = '$update_id'") or die('query failed');
        if($update_query){
            move_uploaded_file( $update_image_tmp_name,$update_image_folder);
            header("Location: admin_models.php");
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
    <div class="line2"></div>

<section class="add-products form-container">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="input-field">
            <label for="productName">Product Name</label>
            <input type="text" id="productName" name="name" required>
        </div>

        <div class="input-field"> 
            <label for="productPrice">Product Price</label>
            <input type="text" id="productPrice" name="price" required>
        </div>

        <div class="input-field">
            <label for="productDetail">Product Detail</label>
            <textarea id="productDetail" name="detail" required></textarea>
        </div>

        <div class="input-field">
            <label for="productImage">Product Image</label>
            <input type="file" id="productImage" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" required>
        </div>
        <div class="input-field">
            <label for="productTRansmission">Product Type de transmission</label>
            <input type="text" id="productTransmission" name="types_de_transmission"  required>
        </div>

        <div class="input-field">
            <label for="productKilometrage">Product Kilometrage</label>
            <input type="text" id="productTransmission" name="Kilometrage"  required>
        </div>

        <div class="input-field">
            <label for="productPlaces">Product Places</label>
            <input type="text" id="productPlaces" name="places" required>
        </div>
        <div class="input-field">
            <label for="productMotorisation">Product Motorisation</label>
            <input type="text" id="productMotorisation" name="types_de_motorisation"  required>
        </div>
       <div class="input-field">
            <label for="productMotorisation">Cars Motorisation</label>
            <select name="productMotorisation" id="productMotorisation">
                <option value="">essence</option>
                <option value="">diesel</option>
                <option value="">hybrid </option>
                <option value="">Ã©lectrique </option>
            </select>
        </div>
        <div class="input-field">
            <label for="productCategory">Cars category</label>
            <select name="productCategory" id="productCategory">
                <option value="">Audi</option>
                <option value="">Mercedes</option>
                <option value="">Volkswagen</option>
                <option value="">Porsche</option>
                <option value="">Fiat</option>
            </select>
        </div>

        <div class="input-field">
            <label for="productTpevoiture">type of cars</label>
            <select name="productTpevoiture" id="productTpevoiture">
                <option value="">luxe</option>
                <option value="">familiale</option>
                
            </select>
        </div>

        <input type="submit" name="add_product" value="Add Product" class="btn">
    </form>
    
</section>
<div class="line3"></div>
    <div class="line4"></div>

    <section class="show-products">
    <div class="box-container mx-auto">
        <?php 
            $select_products = mysqli_query($conn,"SELECT * FROM models ") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
                    <div class="boxes text-center col-lg-3 col-md-4 col-sm-12">                        <div class="card-body">
                            <img src="image/<?php echo $fetch_products['image']; ?>" class="img-fluid mb-3" alt="...">
                            <h4 class="card-title"><?php echo $fetch_products['name']; ?></h4>
                            <p class="kilometrage mb-2">Kilometrage : <?php echo $fetch_products['Kilometrage']; ?>KM</p>
                            <p class="places mb-2">Places : <?php echo $fetch_products['places']; ?>people</p>
                            <p class="motorisation mb-2">Motorisation : <?php echo $fetch_products['types_de_motorisation']; ?></p>
                            <p class="transmission mb-2">Transmission : <?php echo $fetch_products['types_de_transmission']; ?></p>
                            <p class="price mb-2">price : <?php echo $fetch_products['price']; ?>DA</p>
                            <hr class="separator">
                            <details><?php echo $fetch_products['product_detail']; ?></details>
                            <a href="admin_models.php?edit=<?php echo $fetch_products['id']; ?>" class="edit">Edit</a>
                            <a href="admin_models.php?delete=<?php echo $fetch_products['id']; ?>" class="delete" onclick="return confirm('want to delete this product');">Delete</a>
                        </div>
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

        
        <div class="line"></div>

        <section class="update-container">
    <?php
        if(isset($_GET["edit"])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM models WHERE id = '$edit_id' ") or die('query failed');
            if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <img src="image/<?php echo $fetch_edit['image'];?>">
                        <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id'];?>"><br>
                        <input type="text" name="update_name" value="<?php echo $fetch_edit['name'];?>"><br>
                        <input type="number" name="update_price" min="0" value="<?php echo $fetch_edit['price'];?>"><br>
                        <textarea name="update_detail"><?php echo $fetch_edit['product_detail'];?></textarea><br>
                        <input type="file" name="update_image" accept="images/cars/jpg, images/cars/jpeg, images/cars/png, images/cars/webp"><br>
                        <input type="text" name="update_types_transmission" value="<?php echo $fetch_edit['types_de_transmission'];?>"><br>
                        <input type="text" name="update_Kilometrage" value="<?php echo $fetch_edit['Kilometrage'];?>"><br>
                        <input type="text" name="update_places" value="<?php echo $fetch_edit['places'];?>"><br>
                        <input type="text" name="update_types_motorisation" value="<?php echo $fetch_edit['types_de_motorisation'];?>"><br>
                        <input type="submit" name="update_product" value="update" class="edit">
                        <input type="reset" value="cancel" class="option-btn btn" id="close-form">
                    </form>
    <?php
                }
            }
            echo "<script>document.querySelector('.update-container').style.display='block'</script>";
        }
    ?>
</section>

    <script type="text/javascript" src="admin3.js"></script>
</body>
</html>