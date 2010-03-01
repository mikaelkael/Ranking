<?php

namespace Mkk\Tests\Game;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Game_AllTests::main');
}

require_once __DIR__ . '/../TestInit.php';
require_once __DIR__ . '/PlayerTest.php';
require_once __DIR__ . '/Player/AllTests.php';
require_once __DIR__ . '/Ranking/AllTests.php';

class AllTests
{
    public static function main()
    {
        \PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new \PHPUnit_Framework_TestSuite('Mkk Game Tests');

        $suite->addTestSuite('Mkk\Tests\Game\PlayerTest');

        $suite->addTest(Player\AllTests::suite());
        $suite->addTest(Ranking\AllTests::suite());

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Game_AllTests::main') {
    AllTests::main();
}