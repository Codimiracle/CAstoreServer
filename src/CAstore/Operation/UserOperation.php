<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-17
 * Time: 下午8:30
 */
namespace CAstore\Operation;

use Deline\Operation\Operation;

interface UserOperation extends Operation
{
    public function signIn($username, $password);

    public function signUp($userInfo);

    public function signOut();

    public function getUserData();

    public function getUserInfo($id);
}