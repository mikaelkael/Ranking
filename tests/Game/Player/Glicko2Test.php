<?php

namespace Mkk\Tests\Game\Player;

use Mkk\Game\Player\Glicko2;

require_once __DIR__ . '/../../TestInit.php';
require_once __DIR__ . '/../../../library/Mkk/Game/Player/Glicko2.php';

class Glicko2Test extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $this->_player = new Glicko2();
    }
    
    public function testNewVolatility()
    {
        $this->_player->setNewVolatility(1);
        $this->assertEquals(1, $this->_player->getNewVolatility());
    }
}