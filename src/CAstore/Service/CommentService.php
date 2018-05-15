<?php
namespace CAstore\Service;

use Deline\Service\EntityService;

interface CommentService extends EntityService
{
    public function queryByTargetIdWithFloor($targetId, $floor);
    public function queryByTargetId($targetId);
    public function queryByTargetIdWithPageNumber($contentId, $pageNumber);
    
}

