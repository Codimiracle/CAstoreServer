<?php
namespace CAstore\Controller;

use CAstore\Verifier\AppsAppendVerifier;
use Deline\Component\ComponentCenter;
use Deline\Controller\AbstractEntityController;
use CAstore\Service\AppService;

class AppsController extends AbstractEntityController
{

    const SUBMIT_ID_APP_APPEND = "apps_append";

    /** @var  AppService */
    private $appService;

    public function onControllerStart()
    {
        parent::onActionStart();
        $this->attachAction("/^\\/$/", "onAppRoot");
        $this->appService = ComponentCenter::getService($this->container, "AppService");
    }

    public function onControllerEnd()
    {}

    public function onEntityAppend()
    {
        if ($this->isSubmit(self::SUBMIT_ID_APP_APPEND)) {
            $verifier = new AppsAppendVerifier();
        } else {
            $this->view->setPageTitle("添加应用");
            $this->view->setPageName("apps.append");
        }
    }

    public function onAppRoot()
    {
        $this->view->setPageTitle("应用");
        $this->view->setPageName("apps.main");
    }

    public function onEntityEdit()
    {
        /** @var AppInfo $entity */
        $entity = $this->appService->queryById($this->getEntityId());
        if ($entity) {
            $this->view->setPageTitle("编辑应用 - " . $entity->getName());
        } else {
            $this->container->dispatch("/System/PageNotFound");
        }
    }

    public function onEntityDelete()
    {}

    public function onEntityUpdate()
    {}

    public function onEntityDetails()
    {
        $id = $this->getEntityId();
        if ($id != - 1) {
            $entity = $this->appService->queryById($id);
            if ($entity) {
                $this->view->setData("app_info", $entity);
            }
        }
        $this->container->dispatch("/System/PageNotFound");
    }
}
