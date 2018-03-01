<?php
$TAG = "DelineContainer";

require __DIR__ . '/vendor/autoload.php';

require_once "settings.php";

use CAstore\Component\CAstoreComponentCenter;
use Monolog\Handler\StreamHandler;
use Deline\Component\DelineAppclication;

//创建日志
$logger = new Monolog\Logger("CAstoreServer");
$logger->pushHandler(new StreamHandler(__DIR__ . "/server.log", Monolog\Logger::DEBUG));

// 创建组件中心
$components = new CAstoreComponentCenter();

// 创建应用
$application = new DelineAppclication();
$application->setLogger($logger);
$application->setComponentCenter($components);

//运行
$application->run();

