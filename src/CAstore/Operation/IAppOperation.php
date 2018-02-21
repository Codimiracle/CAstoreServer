<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-2-14
 * Time: 下午7:17
 */
namespace CAstore\Operation;

use CAstore\Component\ComponentCenter;

class IAppOperation implements AppOperation
{

    private $context;

    private $target;

    /** @var  AppInfoDAO */
    private $dao;

    /**
     *
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     *
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
        $this->dao = ComponentCenter::getDataAccessObject($context, "AppInfoDAO");
    }

    public function append($app_info)
    {
        $this->dao->setTarget($app_info);
        $this->dao->append();
    }

    public function edit($app_info)
    {
        $this->dao->setTarget($app_info);
        $this->dao->update();
    }

    public function delete($id)
    {}

    public function getAppInfoById($id)
    {
        return $this->dao->queryById($id);
    }

    public function getAppInfoByPackage($package)
    {
        return $this->dao->queryByPackage($package);
    }

    public function getAppInfoByKeyword($keyword)
    {
        return $this->dao->queryByKeyword($keyword);
    }

    public function getTarget($entity)
    {}

    public function queryByKeyword($keyword)
    {}

    public function setTarget($entity)
    {}

    public function queryById($id)
    {}
}
