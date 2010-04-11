<?php

namespace Mkk\Game\Player;

use Mkk\Game\Player;

require_once 'Mkk/Game/Player.php';

class Glicko2 extends Player
{

    protected $_volatility = null;

    protected $_newVolatility = null;
    
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