<?php
namespace CAstore\Service;

use Deline\Service\EntityService;

interface AppService extends EntityService
{
    public function queryByKeyword($keyword);
    public function queryByKeywordWithPagerNumber($keyword, $pagerNumber);
    public function queryByPackage($package);
    public function queryWithPagerNumber($pagerNumber);
}
