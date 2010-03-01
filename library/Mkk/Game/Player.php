<?php

namespace Mkk\Game;

class Player
{

    protected $_id = null;

    protected $_rating = null;

    protected $_ratingDeviation = null;

    protected $_newRating = null;

    protected $_newRatingDeviation = null;

    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setRating($rating)
    {
        $this->_rating = (float) $rating;
        $this->_newRating = (float) $rating;
        return $this;
    }

    public function getRating()
    {
        return $this->_rating;
    }

    public function setRatingDeviation($ratingDeviation)
    {
        $this->_ratingDeviation = (float) $ratingDeviation;
        $this->_newRatingDeviation = (float) $ratingDeviation;
        return $this;
    }

    public function getRatingDeviation()
    {
        return $this->_ratingDeviation;
    }

    public function setNewRating($rating)
    {
        $this->_newRating = (float) $rating;
        return $this;
    }

    public function getNewRating()
    {
        return $this->_newRating;
    }

    public function setNewRatingDeviation($ratingDeviation)
    {
        $this->_newRatingDeviation = (float) $ratingDeviation;
        return $this;
    }

    public function getNewRatingDeviation()
    {
        return $this->_newRatingDeviation;
    }
}
