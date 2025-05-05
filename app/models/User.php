<?php

class User extends Database {
    protected function getUsername(int $id) {
        $query = "SELECT username FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $username = $stmt->fetch();

        if (!$username) {
            throw new Exception("User not found.");
        }

        return $username;
    }

    protected function getPassword(int $id): string {
        $query = "SELECT password FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $password = $stmt->fetch();

        if (!$password) {
            throw new Exception("User not found.");
        }

        return $password;
    }

    protected function getUserByID(int $id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        if (!$user) {
            throw new Exception("User not found.");
        }

        return $user;
    }

    protected function getUserByUsername(string $username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if (!$user) {
            throw new Exception("User not found.");
        }

        return $user;
    }

    protected function userIDExists(int $id):bool {
        $query = "SELECT id FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch()->id ? true : false;
    }

    protected function usernameExists(string $username) {
        $query = "SELECT username FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$username]);
        return $stmt->fetch()->username ? true : false;
    }
}