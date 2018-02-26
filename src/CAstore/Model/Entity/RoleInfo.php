<?php
namespace CAstore\Model\Entity;

use Deline\Model\Entity\Entity;

class RoleInfo implements Entity
{

    public $id;

    public $permission;

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
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     *
     * @param string $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }
}