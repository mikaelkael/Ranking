<?php

class Mkk_Game_Player_Glicko2 extends Mkk_Game_Player
{

    protected $_volatility = null;

    protected $_newVolatility = null;

    public function setVariance($variance)
    {
        $this->_variance = $variance;
        return $this;
    }
    
    public function setVolatility($volatility)
    {
        $this->_volatility = (float) $volatility;
        $this->_newVolatility = (float) $volatility;
    	return $this;
    }

    public function getVolatility()
    {
        return $this->_volatility;
    }

    public function setNewVolatility($volatility)
    {
        $this->_newVolatility = (float) $volatility;
	return $this;
    }

    public function getNewVolatility()
    {
        return $this->_newVolatility;
    }

    public function getMu()
    {
        return (($this->_rating  - 1500) / 173.7178);
    }
    
    public function getPhi()
    {
        return ($this->_ratingDeviation / 173.7178);
    }

    public function setNewMu($mu)
    {
        return $this->setNewRating(173.7178 * $mu + 1500);
    }

    public function setNewPhi($phi)
    {
        return $this->setNewRatingDeviation(173.7178 * $phi);
    }
}