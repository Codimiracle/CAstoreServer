<?php

require __DIR__ . '/vendor/autoload.php';

require_once "settings.php";

use Monolog\Handler\StreamHandler;


$logger = new Monolog\Logger("CAstoreServer");
$logger->pushHandler(new StreamHandler(__DIR__."/server.log", Monolog\Logger::DEBUG));

// create a new instance of Container
$container = new CAstore\Component\DelineContainer();

try {
    // initial Container
    $logger->addDebug("Deline Container initial.");
    $container->init();

    // power on
    $logger->addDebug("Deline Container invoking.");
    $container->invoke();

    // destroy Container
    $logger->addDebug("Deline Container destroy.");
    $container->destroy();
    $logger->addInfo("===================================================");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

