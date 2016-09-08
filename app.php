#!/usr/bin/env php
<?php

set_time_limit(0);
chdir(__DIR__);

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;

use Straube\Console\CommandMapper;

$app = new Application();

$mapper = new CommandMapper('src/', 'App\\Command');
$mapper->registerCommands($app);

$app->run();
