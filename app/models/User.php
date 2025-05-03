<?php

class User extends Database {
    private int $id;

    public function __construct($id) {
        $this->id = $id;
    }

    protected function getUsername() {
        $query = "SELECT username FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->id]);
        $username = $stmt->fetch();

        if (!$stmt) {
            throw new Exception("User not found.");
        }

        return $username;
    }

    protected function getPassword(): string {
        $query = "SELECT password FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->id]);
        $user = $stmt->fetch();

        if (!$stmt) {
            throw new Exception("User not found.");
        }

        return $user->username;
    }
}