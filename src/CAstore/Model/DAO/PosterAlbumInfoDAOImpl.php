<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\AbstractDAO;

class PosterAlbumInfoDAOImpl extends AbstractDAO implements PosterAlbumInfoDAO
{
    const INSERT_SENTENCE = '';
    const UPDATE_SENTENCE = '';
    const DELETE_SENTENCE = '';
    const QUERY_SENTENCE = '';
    
    private $lastInsertedId;
    
    public function getLastInsertedId()
    {
        return $this->lastInsertedId;
    }
    
    public function query()
    {}

    public function insert()
    {}

    public function update()
    {}

    public function delete()
    {}

    public function queryByAppId()
    {}

    public function queryByPosterId()
    {}

    public function queryById($id)
    {}

}

