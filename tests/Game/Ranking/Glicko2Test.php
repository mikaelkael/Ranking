<?php

namespace Mkk\Tests\Game\Ranking;

use Mkk\Game\Ranking\Glicko2 as RankingGlicko2;
use Mkk\Game\Player\Glicko2 as PlayerGlicko2;

require_once __DIR__ . '/../../TestInit.php';
require_once __DIR__ . '/TestCommon.php';
require_once __DIR__ . '/../../../library/Mkk/Game/Ranking/Glicko2.php';

class Glicko2Test extends TestCommon
{

    public function setUp()
    {
        $this->_ranking = new RankingGlicko2();
    }

    /**
     * Test scenario from http://math.bu.edu/people/mg/glicko/glicko2.doc/example.html
     * with all player in 1 game
     */
    public function testScenarioAllInOneGame()
    {
        $player1 = new PlayerGlicko2(array('rating' => 1500, 'ratingDeviation' => 200, 'volatility' => 0.06));
        $player2 = new PlayerGlicko2(array('rating' => 1400, 'ratingDeviation' =>  30, 'volatility' => 0.06));
        $player3 = new PlayerGlicko2(array('rating' => 1550, 'ratingDeviation' => 100, 'volatility' => 0.06));
        $player4 = new PlayerGlicko2(array('rating' => 1700, 'ratingDeviation' => 300, 'volatility' => 0.06));

        $game = new RankingGlicko2();
        $game->addPlayers(array($player4, $player3, $player1, $player2));
        $game->updateRanking();

        $player = $game->getPlayerById(2);
        $this->assertEquals(1464.051, round($player->getNewRating(), 3));
        $this->assertEquals(151.517, round($player->getNewRatingDeviation(), 3));
        $this->assertEquals(0.06, round($player->getNewVolatility(), 2));
    }
}