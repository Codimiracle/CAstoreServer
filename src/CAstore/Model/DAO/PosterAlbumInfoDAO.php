<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\DataAccessObject;

interface PosterAlbumInfoDAO extends DataAccessObject
{
    public function queryByAppId();
    public function queryByPosterId();
}

