<?php

include_once 'app/modules/exceptions.php';

class MusicView extends Music {
    public function getAllMusic(int $limit = 0, int $page = 0) {
        /*
            Returns all music stored in the database based on the number of SONGS_PER_PAGE 

            page * limit

            Because page in here is actually the offset.
            By multiplying them, we get to get the next n limit of data
            Example:
                let page = 0, limit = 20
                would be 0 * 20 = 0
                then we will get the first 20 data

                Another:
                    let page = 3, limit = 10
                    would be 3 * 10 = 30
                    then the 30th offset will be the 30th value to the limit will be returned.
        */
        $offset = $page * $limit;
        return parent::getAllMusic($limit, $offset);
    }

    public function getMusic(int $id) {
        return parent::getMusicByID($id);
    }

    protected function getMinRange(int $limit, int $page) {
        // Ensures that minRange starts with 1 when page=0 (first page)
        return $limit * $page + 1; 
    }

    protected function getMaxRange(int $limit, int $page) {
        // When page=0, limit * page would obviously be 0,
        // To avoid having 0 as the max, we instead get the limit
        return $page ? ($limit * $page) * 2 : $limit;
    }

    public function getRange(int $limit, int $page) {
        $minRange = $this->getMinRange($limit, $page);
        $maxRange = $this->getMaxRange($limit, $page);
        return range($minRange, $maxRange);
    }

    public function hasNextPage(int $limit = 0, int $page = 0) {
        if ($limit) {
            $offset = $this->getMaxRange($limit, $page);
            return (bool)parent::getAllMusic($limit, $offset);
        }
    }

    public function hasPrevPage(int $page = 0) {
        /* 
            Return true if page > 0 else false
            Created this method to be consistent with the hasNextPage()
        */
        return $page > 0;
    }
}
