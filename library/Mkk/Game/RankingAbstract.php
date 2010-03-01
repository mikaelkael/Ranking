<?php

namespace Mkk\Game;

use Mkk\Options;

require_once 'Mkk/Options.php';

abstract class RankingAbstract
{

    protected $_players = array();
   
    public function __construct($options = null)
    {
        Options::setConstructorOptions($this, $options);
    }

    public function addPlayers(array $players)
    {
        foreach ($players as $id => $p) {
            $this->addPlayer($id, $p);
        }
        return $this;
    }

    public function addPlayer($uniqueId, Player $player)
    {
        if (isset($this->_players[$uniqueId])) {
            throw new Exception('Impossible to set the same player 2 times');
        }
        $this->_players[$uniqueId] = $player->setId($uniqueId);
        return $this;
    }
    
    public function getPlayers()
    {
        return $this->_players;
    }

    public function reset()
    {
        $this->_players = array();
    }

    public function getPlayerById($playerId)
    {
        if (isset($this->_players[$playerId])) {
            return $this->_players[$playerId];
        } else {
            return null;
        }
    }
    
    abstract public function updateRanking();
}