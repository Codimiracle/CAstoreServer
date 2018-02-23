<?php
namespace CAstore\Service;

use Deline\Service\Service;

interface UserService extends Service
{

    public function signIn($username, $password);

    public function signUp($userInfo);

    public function signOut();

    public function isLogged();

    public function getUserData();

    public function setUserInfo($userInfo);

    public function getUserInfo();

    public function getRoleInfo();

    public function getUserInfoById($id);
}