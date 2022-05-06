<?php

class UsersView extends Users {

    public function showUser($name) {
        $results = $this->getUser($name);
        echo "Full name : " . $results[0]['users_fname'] . ' ' .$results[0]['users_lname'];
    }

    public function showSUser() {
        // session_start();
        echo $_SESSION["users_id"];
        echo "<br>";
        echo $_SESSION["users_name"];
        echo "<br>";
        echo $_SESSION["users_fname"];
        echo "<br>";
        echo $_SESSION["users_lname"];
    }
    
}