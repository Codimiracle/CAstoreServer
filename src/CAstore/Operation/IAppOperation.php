<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-2-14
 * Time: 下午7:17
 */

namespace CAstore\Operation;

use CAstore\Component\ComponentCenter;
use CAstore\DAO\AppInfoDAO;

class IAppOperation implements AppOperation
{
    private $context;
    private $target;
    /** @var  AppInfoDAO */
    private $dao;

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
        $this->dao = ComponentCenter::getDataAccessObject($context, "AppInfoDAO");
    }

    public function getTarget($entity)
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function append()
    {

    }

    public function delete()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function queryById($id)
    {
        return $this->dao->queryById($id);
    }
}