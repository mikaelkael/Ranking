<?php

namespace Mkk\Tests\Game\Ranking;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Game_Ranking_AllTests::main');
}

require_once __DIR__ . '/../../TestInit.php';
require_once __DIR__ . '/Glicko2Test.php';

class AllTests
{
    public static function main()
    {
        \PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new \PHPUnit_Framework_TestSuite('Mkk Game Ranking Tests');

        $suite->addTestSuite('Mkk\Tests\Game\Ranking\Glicko2Test');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Game_Ranking_AllTests::main') {
    AllTests::main();
}