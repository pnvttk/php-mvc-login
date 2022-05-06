<?php
if(isset($_POST["submit"])) {
    // grabbing the data.
    $users_name = $_POST["users_name"];
    $pwd = $_POST["pwd"];

    // instant signup class.
    include "../classes/Db.class.php";
    include "../classes/Login.class.php";
    include "../classes/LoginContr.class.php";
    $login = new LoginContr($users_name, $pwd);
    
    // running error handlers and user signup.
    $login->loginUser();

    // going to front page.
    header("location: ../index.php?error=none");
}