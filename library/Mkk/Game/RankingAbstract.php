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
        foreach ($players as $p) {
            $this->addPlayer($p);
        }
        return $this;
    }

    public function addPlayer(PlayerInterface $player)
    {
        $uniqueId = $player->getId();
        if (isset($this->_players[$uniqueId])) {
            throw new \Exception('Impossible to set the same player 2 times');
        }
        $this->_players[$uniqueId] = $player;
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
            throw new \Exception('No player set with the given Id');
        }
    }
    
    abstract public function updateRanking();
}