<?php

use ByTIC\SignedUrl\Utility\PackageConfig;
use Nip\Container\Container;

define('PROJECT_BASE_PATH', __DIR__ . '/..');
define('TEST_BASE_PATH', __DIR__);
define('TEST_FIXTURE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'fixtures');

$container = new Container();
Container::setInstance($container);

$data = [
    'signed-url' => require PackageConfig::configPath()
];
$container->set('config', new \Nip\Config\Config($data));

require dirname(__DIR__) . '/vendor/autoload.php';
