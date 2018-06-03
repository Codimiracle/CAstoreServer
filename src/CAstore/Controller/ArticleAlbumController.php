<?php
namespace CAstore\Controller;

use Deline\Controller\AbstractEntityController;
use CAstore\Model\DAO\ArticleAlbumInfoDAO;

class ArticleAlbumController extends AbstractEntityController
{
    const ARTICLE_ALBUM_APPEND = "article_album_append";
    
    /** @var ArticleAlbumInfoDAO */
    private $articleAlbumService;
    
    public function onControllerStart() {
        parent::onControllerStart();
        $this->articleAlbumService = $this->getContainer()->getComponentCenter()->getService("ArticleAlbumService");
    }
    
    public function onEntityPagerCount()
    {
        
    }

    public function onEntityAppend()
    {
        $this->view->setPageTitle("添加文章特辑");
        $this->view->setPageName("article-album.append");
        if ($this->isSubmit(self::ARTICLE_ALBUM_APPEND)) {
            
        } else {
            
        }
    }

    public function onEntityPagerList()
    {
        $this->view->setPageTitle("文章特辑");
        $this->view->setPageName("article-album.main");
        $pageNumber = $this->getPagerNumber();
        $this->view->setData("results", $this->articleAlbumService->queryWithPagerNumber($pageNumber));
        
    }

    public function onEntityDelete()
    {
        
    }

    public function onEntityDetails()
    {
        
    }

    public function onControllerEnd()
    {
        
    }

    public function onEntityEdit()
    {
        
    }
    public function onEntitySearchPagerList()
    {
        
    }

    public function onEntitySearchPagerCount()
    {}

    public function onEntitySearch()
    {}

}

