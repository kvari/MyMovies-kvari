<?php

// Return all movies
function getMovies() {
    $bdd = new PDO('mysql:host=localhost;dbname=mymovies;charset=utf8', 'mymovies_user', 'secret');
    $movies = $bdd->query('select * from movie order by mov_title');
    return $movies;
}