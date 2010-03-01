<?php

namespace Mkk\Game;

abstract class RankingAbstract
{

    protected $_players = array();
    
    public function addPlayer($uniqueId, Player $player)
    {
        if (isset($this->_players[$uniqueId])) {
            throw new Exception('Impossible to set the same player 2 times');
        }
        $this->_players[$uniqueId] = $player->setId($uniqueId);
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