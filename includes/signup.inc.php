<?php
if(isset($_POST["submit"])) {
    // grabbing the data.
    $users_name = $_POST["users_name"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $users_fname = $_POST["users_fname"];
    $users_lname = $_POST["users_lname"];

    // instant signup class.
    include "../classes/Db.class.php";
    include "../classes/Signup.class.php";
    include "../classes/SignupContr.class.php";
    $signp = new SignupContr($users_name, $pwd, $pwdRepeat, $users_fname, $users_lname);
    
    // running error handlers and user signup.
    $signp->signupUser();

    // going to front page.
    header("location: ../index.php?error=none");
}