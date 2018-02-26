<?php
namespace CAstore\Model\Entity;

use Deline\Component\Security;

class UserInfoGenerator
{

    private $entity;

    public function __construct()
    {
        $this->entity = new UserInfo();
    }

    public function getFields()
    {
        return array(
            "username",
            ""
        );
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function generate()
    {
        $userInfo->setName($_POST["username"]);
        $userInfo->setNickname($_POST["nickname"]);
        $userInfo->setPassword(Security::password($_POST["password"]));
        $userInfo->setDescription(isset($_POST["description"]) ? $_POST["description"] : "");
        $userInfo->setGender($_POST["gender"]);
        return $userInfo;
    }
}
