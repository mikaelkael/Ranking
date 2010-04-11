<?php

namespace Mkk\Tests\Game\Player;

use Mkk\Game\Player\Glicko2;

require_once 'Mkk/Game/Player/Glicko2.php';

class Glicko2Test extends \PHPUnit_Framework_TestCase
{

    public function testSettingVolatilityBySetter()
    {
        $player = new Glicko2();
        $player->setVolatility(1234);
        $this->assertEquals(1234, $player->getVolatility());
        $this->assertEquals(1234, $player->getNewVolatility());
    }

    public function testSettingVolatilityByConstructor()
    {
        $player = new Glicko2(array('volatility' => 2345));
        $this->assertEquals(2345, $player->getVolatility());
        $this->assertEquals(2345, $player->getNewVolatility());
    }

    public function testSettingNewVolatility()
    {
        $player = new Glicko2();
        $player->setNewVolatility(1234);
        $this->assertEquals(1234, $player->getNewVolatility());
    }

    public function testGettingKnownMu()
    {
        $player = new Glicko2(array('rating' => 1517.37178));
        $this->assertEquals(0.1, round($player->getMu(), 6));
    }

    public function testSettingMu()
    {
        $player = new Glicko2();
        $player->setNewMu(1);
        $this->assertEquals(1673.7178, $player->getNewRating());
    }

    public function testGettingKnownPhi()
    {
        $player = new Glicko2(array('ratingDeviation' => 173.7178));
        $this->assertEquals(1, $player->getPhi());
    }

    public function testSettingPhi()
    {
        $player = new Glicko2();
        $player->setNewPhi(1);
        $this->assertEquals(173.7178, $player->getNewRatingDeviation());
    }
}