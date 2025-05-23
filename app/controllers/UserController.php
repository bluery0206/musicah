<?php

include_once 'app/modules/exceptions.php';



class UserController extends User {
    private int $MIN_PASSWORD_LENGTH = 8;
    private int $MIN_USERNAME_LENGTH = 2;
    
    protected function validateUsername(string $username): string {
        if (empty($username)) {
            throw new UnexpectedValueException("Username should not be empty.");
        }
        
        if (strlen($username) <= $this->MIN_USERNAME_LENGTH) {
            throw new UnexpectedValueException("Username should be at least {$this->MIN_USERNAME_LENGTH} characters long.");
        }

        return $username;
    }

    protected function validatePassword(string $password): string {
        if (empty($password)) {
            throw new UnexpectedValueException("Password should not be empty.");
        }

        if (strlen($password) <= $this->MIN_PASSWORD_LENGTH) {
            throw new UnexpectedValueException("Password should be at least {$this->MIN_PASSWORD_LENGTH} characters long.");
        }

        if (!preg_match('/[A-Z]/', $password)) {
            throw new UnexpectedValueException("Password should contain at least one uppercase letter.");
        }

        if (!preg_match('/[a-z]/', $password)) {
            throw new UnexpectedValueException("Password should contain at least one lowercase letter.");
        }

        if (!preg_match('/[0-9]/', $password)) {
            throw new UnexpectedValueException("Password should contain at least one number.");
        }

        return $password;
    }

    protected function passwordMatches(string $password1, string $password2): bool {
        return $password1 == $password2;
    }

    public function signin(string $username, string $password) {
        if (empty($username)) {
            throw new EmptyFieldException("username", "Username should not be empty.");
        }
        if (empty($password)) {
            throw new EmptyFieldException("password", "Password should not be empty.");
        }

        if (!$this->usernameExists($username)) {
            throw new  OutOfBoundsException("Username does not exist.");
        }

        if (!password_verify($password, $this->getPasswordByUsername($username))) {
            throw new Exception("Password does not match.");
        }
        
        $_SESSION['user'] = $this->getUserByUsername($username);
    }

    public function signup(string $username, string $password1, string $password2): bool {
        if (empty($username)) {
            throw new EmptyFieldException("username", "Username should not be empty.");
        }
        if (empty($password1)) {
            throw new EmptyFieldException("password1", "Password should not be empty.");
        }
        if (empty($password2)) {
            throw new EmptyFieldException("password2", "Password should not be empty.");
        }

        if ($this->usernameExists($username)) {
            throw new DataAlreadyExistsException("username", "Username already exists.");
        }

        if (!$this->passwordMatches($password1, $password2)) {
            throw new Exception("Passwords does not match.");
        }

        if (!$this->createNewUser($username, password_hash($password1, PASSWORD_DEFAULT))) {
            throw new Exception("The user was not created.");
        }

        return True;
    }

    public function signout() {
        session_unset();
        session_destroy();
    }
}