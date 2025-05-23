<?php

class Music extends Database {
    protected function deleteMusicByID(int $id): bool {
        $query = "DELETE FROM music WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$id]);
    }

    protected function deleteAllMusic(): bool {
        $query = "DELETE FROM music";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute();
    }

    protected function doesRowsExist(string $name, string $artist, string $genre, string $duration) {
        $query = "SELECT COUNT(*) as count FROM music WHERE name = ? AND artist = ? AND genre = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$name, $artist, $genre]);
        return (bool)$stmt->fetch()->count;
    }

    protected function getAllMusic(int $limit = 0, int $offset = 0) {
        if ($limit) {
            $query = "SELECT * FROM music ORDER BY add_date DESC LIMIT ? OFFSET ?";
            $stmt = $this->connect()->prepare($query);
        
            $stmt->bindValue(1, $limit, PDO::PARAM_INT);
            $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        }
        else {
            $query = "SELECT * FROM music";
            $stmt = $this->connect()->prepare($query);
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countRow() {
        $query = "SELECT COUNT(*) as count FROM music";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch()->count;
    }

    protected function getMusicByID(int $id) {
        $query = "SELECT * FROM music WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    protected function insertNewMusic(string $name, string $artist, string $genre, string $duration): bool {
        $query = "INSERT INTO music(name, artist, genre, duration) VALUES(?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$name, $artist, $genre, $duration]);
    }

    protected function updateMusicByID(int $id, string $name, string $artist, string $genre, string $duration): bool {
        $query = "UPDATE music SET name = ?, artist = ?, genre = ?, duration = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$name, $artist, $genre, $duration, $id]);
    }
}