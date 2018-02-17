<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-2-16
 * Time: 下午12:21
 */

namespace CAstore\Entity;


use CAstore\Entity\Generable;
use CAstore\Entity\UserInfo;

class UserInfoGenerator implements Generable
{
    private $entity;
    public function __construct()
    {
        $this->entity = new UserInfo();
    }

    const fields = array();

    private function setEntityAttribute($field, $value) {
        $setter = "set".strtoupper(substr($field,0,1)).strtolower(substr($field,1));
        $this->entity->$setter($value);
    }
    public function getEntity()
    {
        $userInfo->setName($_POST["username"]);
        $userInfo->setNickname($_POST["nickname"]);
        $userInfo->setPassword(Security::password($_POST["password"]));
        $userInfo->setDescription(isset($_POST["description"]) ? $_POST["description"] : "");
        $userInfo->setGender($_POST["gender"]);
        return $userInfo;
    }
}