<?php

class Login extends Db {

    protected function getUser($users_name, $users_pwd) {
        $sql = 'SELECT users_pwd FROM tb_users WHERE users_name = ?;';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($users_name))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }
        
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=userNotFound1");
            exit();
        }
        
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($users_pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=worngPassword");
            exit();
        } elseif ($checkPwd == true) {
            $sql = 'SELECT * FROM tb_users WHERE users_name = ? AND users_pwd = ?;';
            $stmt = $this->connect()->prepare($sql);
            
            if(!$stmt->execute(array($users_name, $pwdHashed[0]['users_pwd']))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed2");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["users_id"] = $user[0]["users_id"];
            $_SESSION["users_name"] = $user[0]["users_name"];
            $_SESSION["users_fname"] = $user[0]["users_fname"];
            $_SESSION["users_lname"] = $user[0]["users_lname"];
        }


        $stmt = null;
    }
    
}