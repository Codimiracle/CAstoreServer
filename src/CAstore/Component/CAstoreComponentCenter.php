<?php
namespace CAstore\Component;

use CAstore\Action\UserController;
use CAstore\Controller\AboutController;
use CAstore\Controller\AppsController;
use CAstore\Controller\CommentController;
use CAstore\Controller\DashboardController;
use CAstore\Controller\FilesController;
use CAstore\Controller\HomeController;
use CAstore\Controller\UploadController;
use CAstore\Model\DAO\AppInfoDAOImpl;
use CAstore\Model\DAO\FileInfoDAOImpl;
use CAstore\Model\DAO\RoleInfoDAOImpl;
use CAstore\Model\DAO\UserInfoDAOImpl;
use CAstore\Service\AppServiceImpl;
use CAstore\Service\CommentServiceImpl;
use CAstore\Service\FileServiceImpl;
use CAstore\Service\UserServiceImpl;
use Deline\Component\AbstractComponentCenter;
use CAstore\Model\DAO\CommentInfoDAOImpl;
use Deline\Service\DelineUploadService;

class CAstoreComponentCenter extends AbstractComponentCenter
{

    public function __construct()
    {
        $defaultController = $this->getControllers();
        $this->setControllers(array_merge($defaultController, array(
            "About" => AboutController::class,
            "Home" => HomeController::class,
            "Apps" => AppsController::class,
            "User" => UserController::class,
            "Files" => FilesController::class,
            "System" => DashboardController::class,
            "Upload" => UploadController::class,
            "Comment" => CommentController::class
        )));
        $defaultDAOs = $this->getDAOs();
        $this->setDAOs(array_merge($defaultDAOs, array(
            "UserInfoDAO" => UserInfoDAOImpl::class,
            "RoleInfoDAO" => RoleInfoDAOImpl::class,
            "AppInfoDAO" => AppInfoDAOImpl::class,
            "CommentInfoDAO" => CommentInfoDAOImpl::class
        )));
        
        $defaultService = $this->getServices();
        $this->setServices(array_merge($defaultService, array(
            "UserService" => UserServiceImpl::class,
            "AppService" => AppServiceImpl::class,
            "CommentService" => CommentServiceImpl::class
        )));
    }
}

