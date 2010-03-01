<?php

namespace Mkk\Tests\Game;

use Mkk\Game\Player;

require_once __DIR__ . '/../TestInit.php';
require_once __DIR__ .  '/../../library/Mkk/Game/Player.php';

class PlayerTest extends \PHPUnit_Framework_TestCase
{

    public function testSetId()
    {
        $player = new Player();
        $player->setId(1);
        $this->assertEquals(1, $player->getId());
    }
}