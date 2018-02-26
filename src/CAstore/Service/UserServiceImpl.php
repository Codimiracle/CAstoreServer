<?php
namespace CAstore\Service;

use CAstore\Model\DAO\RoleInfoDAO;
use CAstore\Model\DAO\UserInfoDAO;
use CAstore\Model\Entity\UserInfo;
use Deline\Component\Container;
use Deline\Component\Security;

class UserServiceImpl implements UserService
{

    const ANONYMOUS_ROLE_ID = 1;

    const SESSION_LOGGED_USER_INFO = "logged_user";

    const SIGN_OUT_MESSAGE = "user.sign.out.message";

    /**
     *
     * @var UserInfoDAO
     */
    private $userInfoDAO;

    /**
     *
     * @var RoleInfoDAO
     */
    private $roleInfoDAO;

    /**
     *
     * @var Container
     */
    private $container;

    /**
     * 设置服务运行容器
     *
     * @param Container $context
     */
    public function setContainer($container)
    {
        $this->container = $container;
        $this->userInfoDAO = $container->getComponentCenter()->getDataAccessObject("UserInfoDAO");
        $this->roleInfoDAO = $container->getComponentCenter()->getDataAccessObject("RoleInfoDAO");
    }

    /**
     * 获取服务运行容器
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * 登录用户
     *
     * @param string $username
     * @param string $password
     * @return int
     */
    public function signIn($username, $password)
    {
        /** @var UserInfo $userInfo */
        $userInfo = $this->userInfoDAO->queryByName($username);
        if ($userInfo) {
            if ($userInfo->getPassword() === Security::password($password)) {
                $this->setUserInfo($userInfo);
                if ($this->setUserPermission($userInfo)) {
                    return 1;
                } else {
                    $this->setUserPermissionByRoleId(self::ANONYMOUS_ROLE_ID);
                    return 2;
                }
            } else {
                return 0;
            }
        } else {
            return - 1;
        }
    }

    /**
     *
     * @param UserInfo $userInfo
     * @return int
     */
    public function signUp($userInfo)
    {
        global $logger;
        try {
            $this->userInfoDAO->setTarget($userInfo);
            $this->userInfoDAO->insert();
            return 1;
        } catch (\Exception $exception) {
            $logger->addError("UserService", array(
                "title" => "signing up failed!",
                "message" => $exception->getMessage()
            ));
            if ($exception->getCode() == "23000") {
                return 0;
            }
            return - 1;
        }
    }

    public function signOut()
    {
        if ($this->isLogged()) {
            $session = $this->container->getSession();
            $session->destroy();
            return true;
        } else {
            return false;
        }
    }

    public function getUserData()
    {
        $data = array();
        /** @var UserInfo $userInfo */
        $userInfo = $this->container->getSession()->getParameter(self::SESSION_LOGGED_USER_INFO);
        $data["username"] = $userInfo->getName();
        $data["nickname"] = $userInfo->getNickname();
        $data["uid"] = $userInfo->getId();
        $data["gender"] = $userInfo->getGender();
        $data["permission"] = $this->container->getPermission()->getPermissions();
        return $data;
    }

    public function isLogged()
    {
        return $this->getUserInfo() ? true : false;
    }

    public function setUserPermissionByRoleId($roleId)
    {
        $roleInfo = $this->roleInfoDAO->queryById($roleId);
        $permission = $this->container->getPermission();
        if ($roleInfo) {
            $permission_list = explode(",", $roleInfo->getPermission());
            $permission->setPermissions($permission_list);
            return true;
        }
        return false;
    }

    public function setUserPermission($userInfo)
    {
        return $this->setUserPermissionByRoleId($userInfo->getRoleId());
    }

    public function setUserInfo($userInfo)
    {
        $session = $this->container->getSession();
        $session->setParameter(self::SESSION_LOGGED_USER_INFO, $userInfo);
    }

    public function getUserInfo()
    {
        $session = $this->container->getSession();
        $userInfo = $session->getParameter(self::SESSION_LOGGED_USER_INFO);
        return $userInfo;
    }

    public function getRoleInfo()
    {
        $roleId = null;
        if ($this->isLogged()) {
            $roleId = $this->getUserInfo()->getRoleId();
        } else {
            $roleId = self::ANONYMOUS_ROLE_ID;
        }
        return $this->roleInfoDAO->queryById($roleId);
    }

    public function getUserInfoById($id)
    {
        $this->userInfoDAO->queryById($id);
    }
}
