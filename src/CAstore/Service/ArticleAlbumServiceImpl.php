<?php
namespace CAstore\Service;

use Deline\Component\Container;
use CAstore\Model\DAO\ArticleAlbumInfoDAO;
use Deline\Model\DAO\SimplePager;

class ArticleAlbumServiceImpl implements ArticleAlbumService
{

    private $container;

    /** @var ArticleAlbumInfoDAO */
    private $articleAlbumInfoDAO;

    /**
     *
     * @return mixed
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
        $this->articleAlbumInfoDAO = $container->getComponentCenter()->getDataAccessObject("ArticleAlbumInfoDAO");
    }

    public function getLastInsertedId()
    {
        return $this->articleAlbumInfoDAO->getLastInsertedId();
    }

    public function edit($entity)
    {
        $this->articleAlbumInfoDAO->setTarget($entity);
        $this->articleAlbumInfoDAO->update();
    }

    public function delete($entity)
    {
        $this->articleAlbumInfoDAO->setTarget($entity);
        $this->articleAlbumInfoDAO->delete();
    }

    public function append($entity)
    {
        $this->articleAlbumInfoDAO->setTarget($entity);
        $this->articleAlbumInfoDAO->insert();
    }
    public function queryWithPagerNumber($pagerNumber)
    {
        $pager = new SimplePager($pagerNumber, 10);
        $this->articleAlbumInfoDAO->setPager($pager);
        return $this->articleAlbumInfoDAO->query();
    }
    
    public function queryById($id)
    {
        return $this->articleAlbumInfoDAO->queryById($id);
    }

    public function queryByAppId($appId)
    {
        return $this->articleAlbumInfoDAO->queryByAppId($appId);
    }
    
    public function queryWithPagerNumber($pagerNumber) {
        $pager = new SimplePager($pagerNumber, 10);
        $this->articleAlbumInfoDAO->setPager($pager);
        return $this->articleAlbumInfoDAO->query();
    }
}

