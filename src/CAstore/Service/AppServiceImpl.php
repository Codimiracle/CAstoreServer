<?php
namespace CAstore\Service;

use Deline\Component\Container;
use CAstore\Model\DAO\AppInfoDAO;

class AppServiceImpl implements AppService
{

    private $container;

    /** @var AppInfoDAO **/
    private $dao;

    /**
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     *
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
        $this->dao = $container->getComponentCenter()->getDataAccessObject("AppInfoDAO");
    }

    public function edit($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->update();
    }

    public function queryByKeyword($keyword)
    {
        return $this->dao->queryByKeyword($keyword);
    }

    public function delete($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->delete();
    }

    public function append($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->insert();
    }

    public function queryById($id)
    {
        return $this->dao->queryById($id);
    }
    public function getLastInsertedId()
    {
        return $this->dao->getLastInsertedId();
    }
    public function queryByPackage($package)
    {
        return $this->dao->queryByPackage($package);
    }


}
