<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Movie;

class MovieDAO extends DAO
{
    /**
     * Return a list of all movies, sorted by date (most recent first).
     *
     * @return array A list of all movies.
     */
    public function findAll() {
        $sql = "select * from movie order by mov_title";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }

    /**
     * Creates an Movie object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MyMovies-kvari\Domain\Movie
     */
    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setId($row['mov_id']);
        $movie->setTitle($row['mov_title']);
        $movie->setSDescription($row['mov_description_short']);
        $movie->setLDescription($row['mov_description_long']);
        $movie->setDirector($row['mov_director']);
        $movie->setYear($row['mov_year']);
        $movie->setImage($row['mov_image']);
        return $movie;
    }
    
    /**
     * Returns an movie matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MyMovies-kvari\Domain\Movie|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from t_article where art_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No article matching id " . $id);
    }
}