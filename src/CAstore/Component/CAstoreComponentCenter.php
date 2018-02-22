<?php
namespace CAstore\Component;

use CAstore\Action\UserController;
use CAstore\Controller\AboutController;
use CAstore\Controller\AppsController;
use CAstore\Controller\HomeController;
use Deline\Component\AbstractComponentCenter;

class CAstoreComponentCenter extends AbstractComponentCenter
{

    public function __construct()
    {
        $defaultController = $this->getControllers();
        $this->setControllers(array_merge($defaultController, array(
            "About" => AboutController::class,
            "Home" => HomeController::class,
            "Apps" => AppsController::class,
            "User" => UserController::class
        )));
    }
}

