<?php
namespace CAstore\Model\Entity;

class PosterAlbumInfo
{
    /** @var int */
    public $id;
    public $appId;
    public $posterId;
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return mixed
     */
    public function getPosterId()
    {
        return $this->posterId;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @param mixed $posterId
     */
    public function setPosterId($posterId)
    {
        $this->posterId = $posterId;
    }

    
    
}

