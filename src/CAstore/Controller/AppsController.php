<?php
namespace CAstore\Controller;

use CAstore\Model\Entity\AppInfo;
use CAstore\Model\Entity\FileInfo;
use CAstore\Service\AppService;
use CAstore\Service\FileService;
use CAstore\Validator\AppsAppendingValidator;
use CAstore\Validator\AppsEditingValidator;
use Deline\Component\PageNotFoundException;
use Deline\Controller\AbstractEntityController;
use Deline\Service\UploadService;

class AppsController extends AbstractEntityController
{

    const SUBMIT_ID_APP_APPEND = "apps_append";

    const SUBMIT_ID_APP_EDIT = "app_edit";

    /** @var  AppService */
    private $appService;

    /** @var FileService */
    private $fileService;

    /** @var UploadService */
    private $uploadService;

    public function onControllerStart()
    {
        parent::onControllerStart();
        $this->attachAction("/^\\/$/", "onAppRoot");
        $this->appService = $this->container->getComponentCenter()->getService("AppService");
        $this->fileService = $this->container->getComponentCenter()->getService("FileService");
        $this->uploadService = $this->container->getComponentCenter()->getService("UploadService");
        $this->commentService = $this->container->getComponentCenter()->getService("CommentService");
    }

    public function onControllerEnd()
    {}

    const POWERPOINT_FIELD = "powerpoint";

    const POWERPOINT_MIMETYPE = "image/*";

    const POWERPOINT_DIR = "static/images/apps";

    public function onEntityAppend()
    {
        global $logger;
        $this->container->getAuthorization()->check("content");
        $this->view->setPageTitle("添加应用");
        if ($this->isSubmit(self::SUBMIT_ID_APP_APPEND)) {
            $message = null;
            // 创建验证器
            $validator = new AppsAppendingValidator();
            $validator->verifyAll();
            if ($validator->isValidity()) { // 是否有效
                if ($this->uploadService->isMimeType(self::POWERPOINT_FIELD, self::POWERPOINT_MIMETYPE)) {
                    // 创建 AppInfo 实体
                    $appInfo = new AppInfo();
                    $appInfo->setTitle($_POST["title"]);
                    $appInfo->setName($_POST["name"]);
                    $appInfo->setDescription($_POST["description"]);
                    $appInfo->setDeveloper($_POST["developer"]);
                    $appInfo->setPackage($_POST["package"]);
                    $appInfo->setPlatform($_POST["platform"]);
                    $appInfo->setVersion($_POST["version"]);
                    $this->appService->append($appInfo);
                    $appContentId = $this->appService->getLastInsertedId();
                    
                    // 处理文件上传
                    $infos = $this->uploadService->getUploadInfoGroup(self::POWERPOINT_FIELD);
                    $dir = getcwd() . "/" . self::POWERPOINT_DIR;
                    $logger->addDebug("AppsController", array(
                        "upload_image_dir" => $dir
                    ));
                    $successful = true;
                    foreach ($infos as $info) {
                        if ($info["error"] != 0) {
                            $successful = false;
                            $logger->addDebug("AppsController", array(
                                "file" => $info["name"],
                                "status" => "uploaded",
                                "result" => "failed"
                            ));
                            break; // 上传失败
                        }
                        $name = $this->uploadService->moveUploadedFileByInfo($info, $dir);
                        if ($name) {
                            // 生成 FileInfo 实体
                            $fileInfo = new FileInfo();
                            $fileInfo->setMimeType($info["type"]);
                            $fileInfo->setPath(self::POWERPOINT_DIR . "/" . $name);
                            $fileInfo->setSize($info["size"]);
                            $fileInfo->setTargetId($appContentId);
                            $this->fileService->append($fileInfo);
                        } else {
                            $successful = false;
                            $logger->addDebug("AppsController", array(
                                "file" => $info["name"],
                                "status" => "moving",
                                "to" => $name,
                                "result" => "failed"
                            ));
                            break; // 文件移动失败
                        }
                    }
                    if ($successful) {
                        $message = "添加应用成功！";
                        $this->view->setPageName("system.info");
                        $this->view->setMessage("info", $message);
                        return;
                    } else {
                        $message = "添加幻灯片时发生错误, 部分文件没有上传成功！";
                    }
                } else {
                    $message = "幻灯片图片格式不正确，请上传正确的图片格式！";
                }
            } else {
                $message = $validator->getResultMessage();
            }
            $this->view->setPageName("system.info");
            $this->view->setMessage("error", $message);
            return;
        } else {
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
        $this->container->getAuthorization()->check("content");
        // EntityId
        $id = $this->getEntityId();
        /** @var AppInfo $entity */
        $entity = $this->appService->queryById($id);
        if ($entity) {
            $this->view->setPageTitle("编辑应用 - " . $entity->getName());
            if ($this->isSubmit(self::SUBMIT_ID_APP_EDIT)) {
                $validator = new AppsEditingValidator();
                $message = null;
                if ($validator->isValidatity()) {
                    $entity->setName($_POST["name"]);
                    $entity->setTitle($_POST["title"]);
                    $entity->setPackage($_POST["package"]);
                    $entity->setDeveloper($_POST["developer"]);
                    $entity->setDescription($_POST["description"]);
                    $entity->setPlatform($_POST["platform"]);
                    $entity->setVersion($_POST["version"]);
                    $this->appService->edit($entity);
                    $message = "更新 App 信息成功！";
                } else {
                    $message = $validator->getResultMessage();
                }
                $this->view->setPageName("system.info");
                $this->view->setMessage("error", $message);
            } else {
                $this->view->setPageName("apps.edit");
                $this->view->setData("app_info", $entity);
            }
        } else {
            throw new PageNotFoundException("无法找到 ID 为\"" . $id . "\"的 APP 实体进行编辑操作！");
        }
    }

    public function onEntityDelete()
    {
        $this->container->getAuthorization()->check("content");
        $id = $this->getEntityId();
        $entity = $this->appService->queryById($id);
        if ($entity) {
            
        }
    }

    public function onEntityDetails()
    {
        $id = $this->getEntityId();
        if ($id != - 1) {
            /** @var AppInfo $entity */
            $entity = $this->appService->queryById($id);
            if ($entity) {
                $powerpoints = $this->fileService->queryByTargetId($entity->getContentId());
                $this->view->setPageTitle($entity->getTitle());
                $this->view->setPageName("apps.details");
                $this->view->setData("app_info", $entity);
                $this->view->setData("app_powerpoint", $powerpoints);
                return;
            }
        }
        throw new PageNotFoundException("Id 为\"" . $id . "\"的 App 实体并不存在！");
    }
}
