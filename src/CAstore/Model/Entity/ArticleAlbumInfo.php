<?php
namespace CAstore\Model\Entity;

class ArticleAlbumInfo extends ArticleInfo
{

    /** @var int */
    public $id;

    /** @var int */
    public $appId;
    
    

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return number
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     *
     * @param number $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }
}

