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
    const SUBMIT_ID_APP_EDIT = "app_edit";

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
        $this->container->getPermission()->check("content");
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
        $this->container->getPermission()->check("content");
        $id = $this->getEntityId();
        /** @var AppInfo $entity */
        $entity = $this->appService->queryById($id);
        if ($entity) {
            if ($this->isSubmit(self::SUBMIT_ID_APP_EDIT)) {
                
            } else {
                $this->view->setPageTitle("编辑应用 - " . $entity->getName());
                $this->view->setPageName("apps.edit");
                $this->view->setData("app_info", $entity);
            }
        } else {
            throw new PageNotFoundException("无法找到 ID 为\"" . $id . "\"的 APP 实体进行编辑操作！");
        }
    }

    public function onEntityDelete()
    {
        $this->container->getPermission()->check("content");
    }

    public function onEntityUpdate()
    {
        $this->container->getPermission()->check("content");
    }

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
        throw new PageNotFoundException("Id 为\"" . $id . "\"的 App 实体并不存在！");
    }
}
