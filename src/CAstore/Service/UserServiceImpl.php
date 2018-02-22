<?php
namespace CAstore\Service;

use Deline\Component\ComponentCenter;
use Deline\Component\Security;
use Deline\Component\Session;

class UserServiceImpl implements UserService
{
    const SESSION_USER_INFO = "session.user.info";

    const SIGN_OUT_MESSAGE = "user.sign.out.message";

    /**
     *
     * @var UserInfoDAO
     */
    private $dao;

    /**
     *
     * @var Context
     */
    private $context;

    /**
     *
     * @param Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
        $this->dao = ComponentCenter::getDataAccessObject($context, "UserInfoDAO");
    }

    /**
     *
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     *
     * @param string $username
     * @param string $password
     * @return int
     */
    public function signIn($username, $password)
    {
        /** @var UserInfo $userInfo */
        $userInfo = $this->dao->queryByName($username);
        if ($userInfo) {
            if ($userInfo->getPassword() == Security::password($password)) {
                $this->context->getSession()->setUserInfo($userInfo);
                return 1;
            } else {
                return 0;
            }
        } else {
            return - 1;
        }
    }

    /**
     *
     * @param
     *            $userInfo
     * @return int
     */
    public function signUp($userInfo)
    {
        global $logger;
        try {
            $this->dao->setTarget($userInfo);
            $this->dao->insert();
            return 1;
        } catch (\Exception $exception) {
            $logger->addError("User sign up error:" . $exception->getMessage());
            if ($exception->getCode() == "23000") {
                return 0;
            }
            return - 1;
        }
    }

    public function signOut()
    {
        if ($this->context->getSession()->isLogged()) {
            $this->context->getSession()->logout();
            return true;
        }
        return false;
    }

    public function getUserData()
    {
        $data = array();
        /** @var UserInfo $userInfo */
        $userInfo = $this->context->getSession()->getParameter(self::SESSION_USER_INFO);
        $data["username"] = $userInfo->getName();
        $data["nickname"] = $userInfo->getNickname();
        $data["uid"] = $userInfo->getId();
        $data["gender"] = $userInfo->getGender();
        return $data;
    }

    public function getUserInfo($id)
    {
        $this->dao->queryById($id);
    }
}
