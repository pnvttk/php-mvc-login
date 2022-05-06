<?php
class LoginContr extends Login {

    private $users_name;
    private $pwd;

    public function __construct($users_name, $pwd) {
        $this->users_name = $users_name;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emyptyinput");
            exit();
        }

        $this->getUser($this->users_name, $this->pwd);
    }

    private function emptyInput() {
        $result;
        if(empty($this->users_name) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
}