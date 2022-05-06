<?php

class Users extends Db {
    
    protected function getUser($name) {
        $sql = "SELECT * FROM tb_users WHERE users_fname = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function addUser($users_fname, $users_lname) {
        $sql = "INSERT INTO tb_users(users_fname, users_lname) VALUE (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$users_fname, $users_lname]);

    }

}