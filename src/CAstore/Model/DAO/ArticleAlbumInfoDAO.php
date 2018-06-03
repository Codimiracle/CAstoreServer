<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\DataAccessObject;

interface ArticleAlbumInfoDAO extends DataAccessObject
{
    public function queryById($id);
    public function queryByAppId($id);
}

