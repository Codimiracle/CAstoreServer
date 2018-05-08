<?php
namespace CAstore\Controller;

use Deline\Controller\AbstractController;

class CommentController extends AbstractController
{

    public function onControllerStart()
    {
        $this->attachAction("/\\/Append$|\\//", "onCommentAppend");
        $this->attachAction("/\\/Edit$|\\//", "onCommentEdit");
        $this->attachAction("/\\/Delete$|\\//", "onCommentDelete");
    }
    
    public function onCommentAppend() {
        
    }
    
    public function onCommentEdit() {
        
    }
    public function onCommentDelete() {
        
    }
    public function onControllerEnd()
    {}

}

