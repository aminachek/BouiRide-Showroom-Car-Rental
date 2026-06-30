<?php
include("connection.php");  // Inclut le fichier de connexion à la base de données

if(isset($_POST['signup-submit'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $confirm = $_POST['confirmpassword'];

    $query = "SELECT `email` FROM users WHERE username = '{$uname}' OR email = '{$email}'";  

    $dup = mysqli_query($conn,$query) or die("connection failed");

    if(mysqli_num_rows($dup) > 0){
        $error = "Username and Email has already taken";
    }
    else{
        if($pword == $confirm){
            $query1= "INSERT INTO users (username,pword,email,conpw) VALUES ('{$uname}','{$pword}','{$email}','{$confirm}')";
            $result = mysqli_query($conn,$query1) or die("Query unsuccessful!");
            echo '
            <script type="text/javascript">
            location.replace("index.php")
            </script>';
        }
        else{

            $error = "password does not match ! ";
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="This is Our Showroom car s">
    <link rel="stylesheet" href="login_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bouiride</title>
    <link rel="website icon" type="png" href="image/logo2.png">
    
</head>
<body>
    <header>
        <a href="BouiRide.php" class="logo">BouiRide</a>
    </header>

    <div class="container">
        <div class="forms-container">
        <div class="signin-signup">

                        <!--form signup-->

                <form class="sign-up-form" method='POST'>
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username"  name="username" required >

            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="password"  name="password" required >

            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="confirmpassword"  name="confirmpassword" required >
            </div>
            <?php
                if(!empty($error)){
                    echo '<div class="input-content">
                    <p class="error">';
                    echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8');
                    echo '</p>
                    </div>';
                }
                ?>
                        
            <input type="submit" value="sign up" class="btn solid" name="signup-submit">

            <p class="social-text">Or sign up with social platforms</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            </form>

            <!--form signin-->
            <form  class="sign-in-form" method='POST'> 
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" placeholder="UserEmail" name="eml">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="password" name="pass">
            </div>

            <?php
            if(isset($_POST['submit'])){
                session_start();
                $email = $_POST[ "eml"];
                $password= $_POST["pass"];

                $sql = "SELECT *FROM users WHERE email = '{$email}' AND pword = '{$password}' ";
                $result = mysqli_query($conn,$sql) or die("query failed");
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_assoc($result);
                        if($row['user_type']=='admin'){
                            $_SESSION['admin_name']=$row['username'];
                            $_SESSION[ 'admin_email']=$row['email'];
                            $_SESSION['admin_id']=$row['id'];
                            header('Location: admin_pannel.php');
                        }else if($row['user_type']=='user'){
                            $_SESSION['user_name']=$row['username'];
                            $_SESSION[ 'user_email']=$row['email'];
                            $_SESSION['user_id']=$row['id'];
                            header('Location: index.php');
                        }

            }else{
            
                echo '<div class="input-content">
                    <p class="error">';
                    echo"Incorrect Email or Password";
                    echo'</p>
                </div>';
        }
    }
?>





            <input type="submit" value="login" class="btn solid" name="submit">
                    

                    <p class="social-text">Or sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis fugiat, ipsum voluptates consequuntur
                    eveniet incidunt laborum iure natus dignissimos dolor dolorum, voluptatum maiores repellat saepe aliquid, odio unde illo in?</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="images/undraw_agreement_re_d4dv.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis fugiat, ipsum voluptates consequuntur
                    eveniet incidunt laborum iure natus dignissimos dolor dolorum, voluptatum maiores repellat saepe aliquid, odio unde illo in?</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="images/undraw_electric_car_b-7-hl.svg" class="image" alt="">
            </div>
        </div>

            <script src="login.js"></script>





    </div>
    
</body>
</html>