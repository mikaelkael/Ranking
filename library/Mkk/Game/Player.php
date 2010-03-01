<?php

namespace Mkk\Game;

use Mkk\Options;

require_once 'Mkk/Options.php';

class Player
{

    /**
     * @var integer|string
     */
    protected $_id = null;

    /**
     * @var float
     */
    protected $_rating = 0;

    /**
     * @var float
     */
    protected $_ratingDeviation = 0;

    /**
     * @var float
     */
    protected $_newRating = 0;

    /**
     * @var float
     */
    protected $_newRatingDeviation = 0;

    /**
     *
     * @param array|Zend_Config $options
     */
    public function __construct($options = null)
    {
        Options::setConstructorOptions($this, $options);
    }

    /**
     * @param integer|string $id
     * @return \Mkk\Game\Player
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param float $rating
     * @return \Mkk\Game\Player
     */
    public function setRating($rating)
    {
        $this->_rating = (float) $rating;
        $this->_newRating = (float) $rating;
        return $this;
    }

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * @param float $rating
     * @return \Mkk\Game\Player
     */
    public function setRatingDeviation($ratingDeviation)
    {
        $this->_ratingDeviation = (float) $ratingDeviation;
        $this->_newRatingDeviation = (float) $ratingDeviation;
        return $this;
    }

    /**
     * @return float
     */
    public function getRatingDeviation()
    {
        return $this->_ratingDeviation;
    }

    /**
     * @param float $rating
     * @return \Mkk\Game\Player
     */
    public function setNewRating($rating)
    {
        $this->_newRating = (float) $rating;
        return $this;
    }

    /**
     * @return float
     */
    public function getNewRating()
    {
        return $this->_newRating;
    }

    /**
     * @param float $rating
     * @return \Mkk\Game\Player
     */
    public function setNewRatingDeviation($ratingDeviation)
    {
        $this->_newRatingDeviation = (float) $ratingDeviation;
        return $this;
    }

    /**
     * @return float
     */
    public function getNewRatingDeviation()
    {
        return $this->_newRatingDeviation;
    }
}
