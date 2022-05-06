<?php
class SignupContr extends Signup {

    private $users_name;
    private $pwd;
    private $pwdRepeat;
    private $users_fname;
    private $users_lname;

    public function __construct($users_name, $pwd, $pwdRepeat, $users_fname, $users_lname) {
        $this->users_name = $users_name;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->users_fname = $users_fname;
        $this->users_lname = $users_lname;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emyptyinput");
            exit();
        }
        if($this->invalidInput() == false) {
            header("location: ../index.php?error=invalidusersname");
            exit();
        }
        //? not have email in this database.
        // if($this->invalidEmail() == false) {
        //     header("location: ../index.php?error=invalidemail");
        //     exit();
        // }
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmismatch");
            exit();
        }
        if($this->usersNameCheck() == false) {
            header("location: ../index.php?error=usertaken");
            exit();
        }

        $this->addUser($this->users_name, $this->pwd, $this->users_fname, $this->users_lname);
    }

    private function emptyInput() {
        $result;
        if(empty($this->users_name) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->users_fname) || empty($this->users_lname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidInput() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->users_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //? Not have email in this database.
    // private function invalidEmail() {
    //     $result;
    //     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    private function pwdMatch() {
        $result;
        if($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function usersNameCheck() {
        $result;
        if(!$this->checkUser($this->users_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
}