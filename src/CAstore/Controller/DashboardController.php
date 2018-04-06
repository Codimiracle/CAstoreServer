<?php
namespace CAstore\Controller;

use Deline\Controller\SystemController;

class DashboardController extends SystemController
{
    public function onControllerStart() {
        parent::onControllerStart();
        $this->attachAction("/^\/User($|\/$)/", "onUserManager");
        $this->attachAction("/^\/File($|\/$)/", "onFileManager");
    }
    
    public function onUserManager() {
        $this->container->getAuthorization()->check("content");
        $this->view->setPageTitle("User Manager");
        $this->view->setPageName("system.user");
    }
    
    public function onFileManager() {
        $this->container->getAuthorization()->check("content");
        $this->view->setPageTitle("User Manager");
        $this->view->setPageName("system.file");
    }
}

