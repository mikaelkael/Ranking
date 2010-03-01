<?php

namespace Mkk\Tests\Game\Player;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Game_Player_AllTests::main');
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
        $suite = new \PHPUnit_Framework_TestSuite('Mkk Game Player Tests');

        $suite->addTestSuite('Mkk\Tests\Game\Player\Glicko2Test');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Game_Player_AllTests::main') {
    AllTests::main();
}