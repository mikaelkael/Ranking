<?php

namespace Mkk\Tests\Game;

use Mkk\Game\Player;

require_once 'Mkk/Game/Player.php';

class PlayerTest extends \PHPUnit_Framework_TestCase
{

    public function testSettingIdBySetter()
    {
        $player = new Player();
        $player->setId(1234);
        $this->assertEquals(1234, $player->getId());
    }

    public function testSettingIdByConstructor()
    {
        $player = new Player(array('id' => 2345));
        $this->assertEquals(2345, $player->getId());
    }

    public function testSettingRatingBySetter()
    {
        $player = new Player();
        $player->setRating(1234);
        $this->assertEquals(1234, $player->getRating());
        $this->assertEquals(1234, $player->getNewRating());
    }

    public function testSettingRatingByConstructor()
    {
        $player = new Player(array('rating' => 2345));
        $this->assertEquals(2345, $player->getRating());
        $this->assertEquals(2345, $player->getNewRating());
    }

    public function testSettingNewRating()
    {
        $player = new Player();
        $player->setNewRating(5678);
        $this->assertEquals(0, $player->getRating());
        $this->assertEquals(5678, $player->getNewRating());
    }

    public function testSettingRatingDeviationBySetter()
    {
        $player = new Player();
        $player->setRatingDeviation(1234);
        $this->assertEquals(1234, $player->getRatingDeviation());
        $this->assertEquals(1234, $player->getNewRatingDeviation());
    }

    public function testSettingRatingDeviationByConstructor()
    {
        $player = new Player(array('ratingDeviation' => 2345));
        $this->assertEquals(2345, $player->getRatingDeviation());
        $this->assertEquals(2345, $player->getNewRatingDeviation());
    }

    public function testSettingNewRatingDeviation()
    {
        $player = new Player();
        $player->setNewRatingDeviation(5678);
        $this->assertEquals(0, $player->getRatingDeviation());
        $this->assertEquals(5678, $player->getNewRatingDeviation());
    }

    public function testSettingPosition()
    {
        $player = new Player();
        $player->setPosition(5678);
        $this->assertEquals(5678, $player->getPosition());
    }
}
