<?php

namespace MyMovies\Domain;

class Movie 
{
    /**
     * Movie id.
     *
     * @var integer
     */
    private $id;

    /**
     * Movie title.
     *
     * @var string
     */
    private $title;

    /**
     * Movie short description.
     *
     * @var string
     */
    private $sDescription;
    
    /**
     * Movie long description.
     *
     * @var string
     */
    private $lDescription;
    
    /**
     * Movie director.
     *
     * @var string
     */
    private $director;
    
    /**
     * Movie Year.
     *
     * @var string
     */
    private $year;
    
    /**
     * Movie image.
     *
     * @var string
     */
    private $image;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getSDescription() {
        return $this->sDescription;
    }

    public function setSDescription($sDescription) {
        $this->sDescription = $sDescription;
    }
    
    public function getLDescription() {
        return $this->sDescription;
    }

    public function setLDescription($lDescription) {
        $this->$lDescription = $lDescription;
    }
    
    public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }
    
    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}