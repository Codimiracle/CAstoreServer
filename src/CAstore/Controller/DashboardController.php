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
        $this->view->setPageName("system.manager");
        $this->view->setData("fields", array("test1", "test2"));
        $this->view->setData("list", array(array("test1" => 1, "test2" => 2), array("test1"=>3, "test2"=>4)));
        $this->view->setData("headers", array("Test1", "Test2"));
    }
    
    public function onFileManager() {
        $this->container->getAuthorization()->check("content");
        $this->view->setPageTitle("User Manager");
        $this->view->setPageName("system.manager");
    }
}

