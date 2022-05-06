<?php
    // declare(strict_types = 1);
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
    
    <?php

    // show single user.
    $usersObj = new UsersView();
    $usersObj->showUser("pannavach");

    // insert user.
    // $usersObj2 = new UsersContr();
    // $usersObj2->createUser("jason", "frost");

    ?>
    
</body>
</html>