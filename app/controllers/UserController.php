<?php

class UserController extends User {    
    
    public function validateUsername(string $username) {
        $usernameErrors = [];

        $username = filter_var($username, FILTER_SANITIZE_STRING);

        if (empty($username)) {
            array_push($usernameErrors, "Username should not be empty.");
        }

        if ($this->usernameExists($username)){
            array_push($usernameErrors, "Username already exists.");
        }
    }

    public function login(string $username, string $password) {
        $errors = []; 


    }
}