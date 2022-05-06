<?php

class Signup extends Db {

    protected function addUser($users_name, $pwd, $users_fname, $users_lname) {
        $sql = 'INSERT INTO tb_users(users_name, users_pwd, users_fname, users_lname) VALUE (?, ?, ?, ?);';
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($users_name, $hashedPwd, $users_fname, $users_lname))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    

    protected function checkUser($users_name) {
        $sql = 'SELECT users_name FROM tb_users WHERE users_name = ?;';
        $stmt = $this->connect()->prepare($sql);

        //? execute -> array or []
        if(!$stmt->execute([$users_name])) {
            $stmt = null;
            header("location: ../index.php?error=usersnameTaken");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;

    }
}