<?php
namespace CAstore\Service;

use Deline\Component\Container;
use CAstore\Model\DAO\FileInfoDAO;

class FileServiceImpl implements FileService
{
    /** @var FileInfoDAO */
    private $dao;
    
    /** @var Container */
    private $container;
    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
        $this->dao = $container->getComponentCenter()->getDataAccessObject("FileInfoDAO");
    }
    
    public function edit($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->update();
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
    
    public function query()
    {
        return $this->dao->query();
    }
    
    public function queryByTargetId($targetId)
    {
        return $this->dao->queryByTargetId($targetId);
    }
}

