<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\DataAccessObject;

interface ArticleInfoDAO extends DataAccessObject
{
    public function queryByTitle($title);
    public function queryByContentId($contentId);
}

