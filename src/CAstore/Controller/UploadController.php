<?php
namespace CAstore\Controller;

use Deline\Controller\AbstractController;

class UploadController extends AbstractController
{
    /** @var \CommonUploadService */
    private $uploadService;

    public function onControllerStart()
    {
        $this->attachAction("/^\/$/", "onUploading");
        $this->attachAction("/^\/Do(\/$|$)/", "onDoUpload");
        $this->uploadService = $this->getContainer()->getComponentCenter()->getService("CommonUploadService");
    }
    public function onDoUpload() {
        $this->uploadService->doUpload();
    }
    public function onUploading() {
        $this->view->setPageTitle("Upload Service");
        $this->view->setPageName("upload.basic");
    }
    
    public function onControllerEnd()
    {
        
    }
    
    
}

