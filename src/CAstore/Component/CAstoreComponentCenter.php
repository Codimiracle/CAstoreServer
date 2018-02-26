<?php
namespace CAstore\Component;

use CAstore\Action\UserController;
use CAstore\Controller\AboutController;
use CAstore\Controller\AppsController;
use CAstore\Controller\HomeController;
use CAstore\Model\DAO\AppInfoDAOImpl;
use CAstore\Model\DAO\RoleInfoDAOImpl;
use CAstore\Model\DAO\UserInfoDAOImpl;
use CAstore\Service\AppServiceImpl;
use CAstore\Service\UserServiceImpl;
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
        $this->setDAOs(array(
            "UserInfoDAO" => UserInfoDAOImpl::class,
            "RoleInfoDAO" => RoleInfoDAOImpl::class,
            "AppInfoDAO" => AppInfoDAOImpl::class
        ));
        $this->setServices(array(
            "UserService" => UserServiceImpl::class,
            "AppService" => AppServiceImpl::class
        ));
    }
}

