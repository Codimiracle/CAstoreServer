<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\DataAccessObject;

interface AppInfoDAO extends DataAccessObject
{

    public function queryByTag($tag);

    public function queryByDeveloper($developer);

    public function queryByKeyword($keyword);

    public function queryByPackage($package);
}