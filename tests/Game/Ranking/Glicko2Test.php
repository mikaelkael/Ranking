<?php

namespace Mkk\Tests\Game\Ranking;

use Mkk\Game\Ranking\Glicko2 as RankingGlicko2;
use Mkk\Game\Player\Glicko2 as PlayerGlicko2;

require_once __DIR__ . '/TestCommon.php';
require_once 'Mkk/Game/Ranking/Glicko2.php';
require_once 'Mkk/Game/Player/Glicko2.php';

class Glicko2Test extends TestCommon
{

    public function setUp()
    {
        $this->_ranking = new RankingGlicko2();
    }

    public function testAddPlayer()
    {
        $player = new PlayerGlicko2();
        $this->_ranking->addPlayer($player);
        $this->assertEquals(1, count($this->_ranking->getPlayers()));
    }

    public function testAddPlayerWithoutImplementingPlayerInterface()
    {
        $player = new \stdClass();
        $this->setExpectedException('Exception');
        $this->_ranking->addPlayer($player);
    }

    public function testAddMultiplePlayer()
    {
        $player1 = new PlayerGlicko2(array('id' => 1));
        $player2 = new PlayerGlicko2(array('id' => 2));
        $player3 = new PlayerGlicko2(array('id' => 3));
        $this->_ranking->addPlayers(array($player1, $player2, $player3));
        $this->assertEquals(3, count($this->_ranking->getPlayers()));
    }

    public function testAddMultiplePlayerWithSameId()
    {
        $player1 = new PlayerGlicko2(array('id' => 2));
        $player2 = new PlayerGlicko2(array('id' => 2));
        $player3 = new PlayerGlicko2(array('id' => 3));
        $this->setExpectedException('Exception');
        $this->_ranking->addPlayers(array($player1, $player2));
    }

    public function testResetPlayers()
    {
        $player1 = new PlayerGlicko2(array('id' => 1));
        $player2 = new PlayerGlicko2(array('id' => 2));
        $player3 = new PlayerGlicko2(array('id' => 3));
        $this->_ranking->addPlayers(array($player1, $player2, $player3));
        $this->assertEquals(3, count($this->_ranking->getPlayers()));
        $this->_ranking->reset();
        $this->assertEquals(0, count($this->_ranking->getPlayers()));
    }

    public function testGettingPlayerById()
    {
        $player = new PlayerGlicko2(array('id' => 1234));
        $this->_ranking->addPlayer($player);
        $this->assertSame($player, $this->_ranking->getPlayerById(1234));
    }

    public function testGettingUnkownPlayerById()
    {
        $player = new PlayerGlicko2(array('id' => 1));
        $this->_ranking->addPlayer($player);
        $this->setExpectedException('Exception');
        $this->assertSame($player, $this->_ranking->getPlayerById(1234));
    }

    /**
     * Test scenario from http://math.bu.edu/people/mg/glicko/glicko2.doc/example.html
     * with all player in 1 game
     */
    public function testScenarioAllInOneGame()
    {
        $player1 = new PlayerGlicko2(array('id' => 1, 'rating' => 1500, 'ratingDeviation' => 200, 'volatility' => 0.06));
        $player2 = new PlayerGlicko2(array('id' => 2, 'rating' => 1400, 'ratingDeviation' =>  30, 'volatility' => 0.06));
        $player3 = new PlayerGlicko2(array('id' => 3, 'rating' => 1550, 'ratingDeviation' => 100, 'volatility' => 0.06));
        $player4 = new PlayerGlicko2(array('id' => 4, 'rating' => 1700, 'ratingDeviation' => 300, 'volatility' => 0.06));

        $game = new RankingGlicko2();
        $game->addPlayers(array($player4, $player3, $player1, $player2));
        $game->updateRanking();

        $player = $game->getPlayerById(1);
        $this->assertEquals(1464.051, round($player->getNewRating(), 3));
        $this->assertEquals(151.517, round($player->getNewRatingDeviation(), 3));
        $this->assertEquals(0.06, round($player->getNewVolatility(), 2));
    }

    /**
     * Test scenario when only updating rating deviation of 1 player
     */
    public function testScenarioOnlyOnePlayer()
    {
        $player = new PlayerGlicko2(array('id' => 1, 'rating' => 1500, 'ratingDeviation' => 200, 'volatility' => 0.06));

        $game = new RankingGlicko2();
        $game->addPlayer($player);
        $game->updateRanking();

        $player = $game->getPlayerById(1);
        $this->assertEquals(1500, round($player->getNewRating(), 3));
        $this->assertEquals(200.271, round($player->getNewRatingDeviation(), 3));
        $this->assertEquals(0.06, round($player->getNewVolatility(), 2));
    }
}