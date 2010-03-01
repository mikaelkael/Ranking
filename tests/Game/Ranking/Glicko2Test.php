<?php

namespace Mkk\Tests\Game\Ranking;

use Mkk\Game\Ranking\Glicko2;

require_once __DIR__ . '/../../TestInit.php';
require_once __DIR__ . '/TestCommon.php';
require_once __DIR__ . '/../../../library/Mkk/Game/Ranking/Glicko2.php';

class Glicko2Test extends TestCommon
{

    public function setUp()
    {
        $this->_ranking = new Glicko2();
    }
}