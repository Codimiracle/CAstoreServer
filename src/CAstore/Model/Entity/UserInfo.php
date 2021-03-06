<?php
namespace CAstore\Model\Entity;

use Deline\Model\Entity\Entity;

class UserInfo implements Entity
{

    /**
     * 用户Id
     *
     * @var integer
     */
    public $id;

    /**
     * 用户名
     *
     * @var string
     */
    public $name;

    /**
     * 用户昵称
     *
     * @var string
     */
    public $nickname;

    /**
     * 用户密码
     *
     * @var string
     */
    public $password;

    /**
     * 用户性别
     *
     * @var int
     */
    public $gender;

    /**
     * 用户描述
     *
     * @var string
     */
    public $description;

    /**
     * 用户头像
     *
     * @var string
     */
    public $avatar = "default-avtar.png";

    /**
     * 用户角色
     *
     * @var int
     */
    public $roleId;
    
    public $joinTime;
    
    public $updatedTime;

    /**
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     *
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     *
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     *
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     *
     * @param mixed $roleInfoId
     */
    public function setRoleId($roleInfoId)
    {
        $this->roleId = $roleInfoId;
    }

    /**
     *
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }
    /**
     * @return mixed
     */
    public function getJoinTime()
    {
        return $this->joinTime;
    }

    /**
     * @return mixed
     */
    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }

}