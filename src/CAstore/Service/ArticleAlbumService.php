<?php
namespace CAstore\Service;

use Deline\Service\EntityService;

interface ArticleAlbumService extends EntityService
{
    public function queryByAppId($appId);
    public function queryWithPagerNumber($pagerNumber);
}

