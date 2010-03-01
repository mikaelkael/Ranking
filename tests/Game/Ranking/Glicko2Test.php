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
        $player1 = new PlayerGlicko2();
        $player1->setRating(1500);
        $player1->setRatingDeviation(200);
        $player1->setVolatility(0.06);

        $player2 = new PlayerGlicko2();
        $player2->setRating(1400);
        $player2->setRatingDeviation(30);
        $player2->setVolatility(0.06);

        $player3 = new PlayerGlicko2();
        $player3->setRating(1550);
        $player3->setRatingDeviation(100);
        $player3->setVolatility(0.06);

        $player4 = new PlayerGlicko2();
        $player4->setRating(1700);
        $player4->setRatingDeviation(300);
        $player4->setVolatility(0.06);

        $game = new RankingGlicko2();
        $game->addPlayer(1, $player4);
        $game->addPlayer(2, $player3);
        $game->addPlayer(3, $player1);
        $game->addPlayer(4, $player2);
        $game->updateRanking();

        $player = $game->getPlayerById(3);
        $this->assertEquals(1464.051, round($player->getNewRating(), 3));
        $this->assertEquals(151.517, round($player->getNewRatingDeviation(), 3));
        $this->assertEquals(0.06, round($player->getNewVolatility(), 2));
    }
}