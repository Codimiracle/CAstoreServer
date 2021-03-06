<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-31
 * Time: 下午10:05
 */
namespace CAstore\Controller;

use Deline\Controller\AbstractController;

class AboutController extends AbstractController
{

    public function onControllerStart()
    {
        $this->attachAction("/^\\/License($|\\/$)/", "onLicenseVisiting");
    }

    public function onLicenseVisiting()
    {
        $this->view->setPageTitle("《CAstore 服务协议》");
        $this->view->setPageName("about.license");
    }

    public function onControllerEnd()
    {}
}
