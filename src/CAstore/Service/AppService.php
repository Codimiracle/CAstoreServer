<?php
namespace CAstore\Service;

use Deline\Service\EntityService;

interface AppService extends EntityService
{
    public function queryByKeyword($keyword);
}
