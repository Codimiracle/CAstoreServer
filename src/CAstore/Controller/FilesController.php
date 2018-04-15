<?php
namespace CAstore\Controller;

use Deline\Controller\AbstractController;

class FilesController extends AbstractController
{


    public function onControllerStart()
    {
        $this->attachAction("/^\/Upload(\/$|$)/", "onFileUpload");
    }
     
    public function onFileUpload() {
        
    }
    public function onFilePartitionUpload() {
        
    }

    public function onControllerEnd()
    {}

}

