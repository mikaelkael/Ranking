<?php

namespace Mkk\Tests\Game\Ranking;

abstract class TestCommon extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Mkk\Game\RankingAbstract
     */
    protected $_ranking = null;

    public function testInitializePlayer()
    {
        $this->assertEquals(0, count($this->_ranking->getPlayers()));
    }
}