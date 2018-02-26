<?php
namespace CAstore\Controller;

use CAstore\Service\AppService;
use CAstore\Verifier\AppsAppendVerifier;
use Deline\Component\PageNotFoundException;
use Deline\Controller\AbstractEntityController;
use CAstore\Service\FileService;

class AppsController extends AbstractEntityController
{

    const SUBMIT_ID_APP_APPEND = "apps_append";

    /** @var  AppService */
    private $appService;
    /** @var FileService */
    private $fileService;

    public function onControllerStart()
    {
        parent::onControllerStart();
        $this->attachAction("/^\\/$/", "onAppRoot");
        $this->appService = $this->container->getComponentCenter()->getService("AppService");
        $this->fileService = $this->container->getComponentCenter()->getService("FileService");
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
        $id = $this->getEntityId();
        /** @var AppInfo $entity */
        $entity = $this->appService->queryById($id);
        if ($entity) {
            $this->view->setPageTitle("编辑应用 - " . $entity->getName());
        } else {
            throw new PageNotFoundException("无法找到 ID 为\"" . $id . "\"的应用实体进行编辑操作！");
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
                $this->view->setPageTitle($entity->getTitle());
                $this->view->setPageName("apps.details");
                $this->view->setData("app_info", $entity);
                return;
            }
        }
        throw new PageNotFoundException("Id 为\"" . $id . "\"并不存在！");
    }
}
