<?php

namespace CAstore\Controller;

use Deline\Controller\AbstractController;

class SystemController extends AbstractController
{

    public function onControllerStart()
    {
        $this->attachAction("/^\\/$/", "onSystemRoot");
        $this->attachAction("/^\\/PageNotFound$/", "onPageNotFound");
        $this->attachAction("/^\\/PageError$/", "onPageError");
        $this->attachAction("/^\\/NodePathError$/", "onNodePathError");
    }

    public function onSystemRoot()
    {
        $this->view->setPageTitle("phpinfo");
        $this->view->setPageName("system.main");
    }

    public function onNodePathError()
    {
        $this->view->setPageTitle("Security");
        $this->view->setPageName("system.info");
        $this->view->setMessage("danger", "我们已经记录这个问题,并在一个工作日内调查问题原因。");
    }

    public function onPageNotFound()
    {
        $this->view->setPageTitle("Page Not Found");
        $this->view->setPageName("system.page-not-found");
        $this->view->setMessage("alert", "Page Not Found");
    }

    public function onPageError()
    {
        $this->view->setPageTitle("Page Error");
        $this->view->setPageName("system.page-error");
    }

    public function onControllerEnd()
    {}
}