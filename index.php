<?php
    session_start();
    include 'includes/autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <h3>PHP PDO MVC User Login System</h3>
            </div>
            <ul class="menu-member">
                <?php
                    if(isset($_SESSION["users_id"])) {
                ?>
                <li><a href="#"><?php echo $_SESSION["users_name"]; ?></a></li>
                <li><a href="includes/logout.inc.php" class="header-login-a">LOGOUT></a></li>
                <?php
                    } else {
                ?>
                <li><a href="#">SIGN UP</a></li>
                <li><a href="#" class="header-login-a">LOGIN</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </header>
    
    <div>
        <p>
            <?php 
            if(isset($_SESSION["users_id"])) {
                echo "showSUserData";
                echo "<br>";
                $usersObj = new UsersView();
                $usersObj->showSUser();
            }
            ?>
        </p>
    </div>
    
    <section class="index-login">
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>SIGN UP</h4>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="users_name" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwdRepeat" placeholder="Repeat Password">
                    <input type="text" name="users_fname" placeholder="First Name">
                    <input type="text" name="users_lname" placeholder="Last Name">
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
            </div>
            <div class="index-login-login">
                <h4>LOGIN</h4>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="users_name" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>