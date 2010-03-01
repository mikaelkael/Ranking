<?php

namespace Mkk\Tests;

error_reporting(E_ALL | E_STRICT);

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

set_include_path(
    __DIR__ . DIRECTORY_SEPARATOR . '../' . 'library'
    . PATH_SEPARATOR .
    get_include_path()
);

