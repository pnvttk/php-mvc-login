<?php

class UsersContr extends Users {

    public function createUser($users_fname, $users_lname) {
        
        $this->addUser($users_fname, $users_lname);

    }

}