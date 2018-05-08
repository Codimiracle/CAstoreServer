<?php
namespace CAstore\Service;


use CAstore\Model\DAO\CommentInfoDAO;

class CommentServiceImpl implements CommentService
{

    private $container;
    /**@var CommentInfoDAO */
    private $dao;

    
    public function setContainer($container)
    {
        $this->container = $container;
        $this->dao = $container->getComponentCenter()->getDataAccessObject("CommentInfoDAO");
    }
    public function getContainer()
    {
        return $this->container;
    }
    
    public function getLastInsertedId()
    {
        return $this->dao->getLastInsertedId();
    }

    public function edit($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->update();
    }


    public function queryByTargetId($contentId)
    {
        return $this->dao->queryByTargetId($contentId);
    }

    public function delete($entity)
    {
        $this->dao->setTarget($entity);
        $this->dao->delete();
    }



    public function queryByTargetIdWithFloor($contentId, $floor)
    {
        
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
}

