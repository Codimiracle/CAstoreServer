<?php
namespace CAstore\Service;

use CAstore\Model\Entity\AppInfo;
use Deline\Component\ComponentCenter;
use Deline\Component\Context;

class AppServiceImpl implements AppService
{

    /** @var Context **/
    private $context;

    /** @var AppInfo **/
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
