<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\DataAccessObject;

interface UserInfoDAO extends DataAccessObject
{

    public function queryByRoleId();

    public function queryByName($name);

    public function queryByTag($tag);
}