<?php
namespace CAstore\Service;

use Deline\Component\Container;

class AppServiceImpl implements AppService
{

    private $container;
    
    private $dao;
    
    private $target;
    

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
    
    

    /**
     * @return mixed
     */
    public function getTarget()
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

    public function edit()
    {
        
    }

    public function delete()
    {
        
    }

    public function append()
    {
        
    }
    
    public function queryById($id)
    {
        return $this->dao->queryById($id);
    }
    
    public function queryByKeyword($keyword)
    {
        
    }
}
