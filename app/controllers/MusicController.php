<?php

include_once 'app/modules/exceptions.php';

class MusicController extends Music {
    public function deleteMusic(int $id): void {
        if (!$this->deleteMusicByID($id)) {
            throw new NotFoundException("Music not found");
        }
    }

    public function deleteAllMusic(): bool {
        return parent::deleteAllMusic();
    }

    public function updateMusic(int $id, string $name, string $artist, string $genre, string $duration): void {
        if (empty($id)) {
            throw new Exception("Music with such id, not found.");
        }
        if (empty($name)) {
            throw new EmptyFieldException("name", "Name should not be empty.");
        }
        if (empty($artist)) {
            throw new EmptyFieldException("artist", "Artist should not be empty.");
        }
        if (empty($genre)) {
            throw new EmptyFieldException("genre", "Genre should not be empty.");
        }
        if (empty($duration)) {
            throw new EmptyFieldException("duration", "Duration should not be empty.");
        }

        if (!$this->updateMusicByID($id, $name, $artist, $genre, $duration)) {
            throw new NotFoundException("Failed to update music");
        } 
    }

    public function insertNewMusic(string $name, string $artist, string $genre, string $duration): bool {
        if ($this->doesRowsExist($name, $artist, $genre, $duration) ) {
            throw new Exception("A song with such details already exists.");
        }

        if (empty($name)) {
            throw new EmptyFieldException("name", "Name should not be empty.");
        }
        if (empty($artist)) {
            throw new EmptyFieldException("artist", "Artist should not be empty.");
        }
        if (empty($genre)) {
            throw new EmptyFieldException("genre", "Genre should not be empty.");
        }
        if (empty($duration)) {
            throw new EmptyFieldException("duration", "Duration should not be empty.");
        }

        if (!parent::insertNewMusic($name, $artist, $genre, $duration)) {
            throw new Exception("Failed to insert music");
        }

        return true;
    }
}