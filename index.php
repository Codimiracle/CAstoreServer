<?php
$TAG = "DelineContainer";

require __DIR__ . '/vendor/autoload.php';

require_once "settings.php";

use Monolog\Handler\StreamHandler;


$logger = new Monolog\Logger("CAstoreServer");
$logger->pushHandler(new StreamHandler(__DIR__."/server.log", Monolog\Logger::DEBUG));

// create a new instance of Container
$container = new CAstore\Component\DelineContainer();

try {
    // initial Container
    $logger->addDebug($TAG, array("procedure" => "init-start"));
    $container->init();
    $logger->addDebug($TAG, array("procedure" => "init-end"));
    
    // power on
    $logger->addDebug($TAG, array("procedure" => "invoke-start"));
    $container->invoke();
    $logger->addDebug($TAG, array("procedure" => "invoke-end"));
    
    // destroy Container
    $logger->addDebug($TAG, array("procedure"=> "destroy-start"));
    $container->destroy();
    $logger->addDebug($TAG, array("procedure"=> "destroy-end"));
    $logger->addInfo("===================================================");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

