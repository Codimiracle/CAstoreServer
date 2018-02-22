<?php
$TAG = "DelineContainer";

require __DIR__ . '/vendor/autoload.php';

require_once "settings.php";

use Monolog\Handler\StreamHandler;
use CAstore\Component\CAstoreComponentCenter;


$logger = new Monolog\Logger("CAstoreServer");
$logger->pushHandler(new StreamHandler(__DIR__."/server.log", Monolog\Logger::DEBUG));

//创建组件中心
$components = new CAstoreComponentCenter();

//创建容器
$container = new Deline\Component\DelineContainer();
$container->setComponentCenter($components);

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

