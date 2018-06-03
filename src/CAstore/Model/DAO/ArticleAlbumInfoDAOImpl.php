<?php
namespace CAstore\Model\DAO;

use CAstore\Model\Entity\ArticleAlbumInfo;
use Deline\Model\DAO\AbstractDAO;
use PDOException;
use Deline\Model\DAO\SimplePager;

class ArticleAlbumInfoDAOImpl extends AbstractDAO implements ArticleAlbumInfoDAO
{
    const INSERT_CONTENT = "INSERT INTO content(title, name, content, createdTime, updatedTime) VALUES (:title, 'article_content', :description, NOW(),NOW())";
    const INSERT_SENTENCE = "INSERT INTO article_album (cid, aid) VALUES (:cid, :appId)";
    
    const UPDATE_CONTENT_SENTENCE = "UPDATE content SET title = :title, :description = :description WHERE id = (SELECT cid FROM article_album WHERE id = :id)";
    const UPDATE_SENTENCE = 'UPDATE article_album SET aid = :appId WHERE id = :id';
    
    const DELETE_CONTENT_SENTENCE = "DELETE FROM content WHERE id = (SELECT cid FROM article_album WHERE id = :id)";
    const DELETE_SENTENCE = "DELETE FROM article_album WHERE id = :id";
    
    const QUERY_SENTENCE = "SELECT * FROM article_album";
    const QUERY_BY_USER_ID_SENTENCE = "SELECT * FROM article_album WHERE userId = :userId";
    const QUERY_BY_APP_ID_SENTENCE = "SELECT * FROM article_album WHERE appId = :appId";
    const QUERY_BY_ID_SENTENCE = "SELECT * FROM article_album WHERE id = :id";

    private $lastInsertedId;
    
    /**
     * @return ArticleAlbumInfo
     * {@inheritDoc}
     * @see \Deline\Model\DAO\AbstractDAO::getTarget()
     */
    public function getTarget() {
        return parent::getTarget();
    }
    
    public function insert()
    {
        $connection = $this->getDataSource()->getConnection();
        $connection->beginTransaction();
        try {
            $prepared = $connection->prepare(self::INSERT_CONTENT);
            $prepared->bindValue(":title", $this->getTarget()->getTitle());
            $prepared->bindValue(":description", $this->getTarget()->getContent());
            $prepared->execute();
            $this->lastInsertedId = $connection->lastInsertId();
            $prepared = $connection->prepare(self::INSERT_SENTENCE);
            $prepared->bindValue(":cid", $this->lastInsertedId);
            $prepared->bindValue(":appId", $this->getTarget()->getAppId());
            $prepared->execute();
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function update()
    {
        $connection = $this->getDataSource()->getConnection();
        $connection->beginTransaction();
        try {
            $prepared = $connection->prepare(self::UPDATE_CONTENT_SENTENCE);
            $prepared->bindValue(":title", $this->getTarget()->getTitle());
            $prepared->bindValue(":description", $this->getTarget()->getContent());
            $prepared->bindValue(":id", $this->getTarget()->getId());
            $prepared->execute();
            $prepared = $connection->prepare(self::UPDATE_SENTENCE);
            $prepared->bindValue(":appId", $this->getTarget()->getAppId());
            $prepared->bindValue(":id", $this->getTarget()->getId());
            $prepared->execute();
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function delete()
    {
        $connection = $this->getDataSource()->getConnection();
        $connection->beginTransaction();
        try {
            $prepared = $connection->prepare(self::DELETE_SENTENCE);
            $prepared->bindValue(":articleId", $this->getTarget()->getId());
            $prepared->execute();
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function query()
    {
        return $this->getEntities(self::QUERY_SENTENCE, array(), ArticleAlbumInfo::class);
    }
    
    public function getLastInsertedId()
    {
        return $this->lastInsertedId;
    }
    
    public function queryByAppId($appId)
    {
        return $this->getEntities(self::QUERY_BY_APP_ID_SENTENCE, array(":appId" => $appId), ArticleAlbumInfo::class);
    }
    
    public function queryByUserId($userId) {
        return $this->getEntities(self::QUERY_BY_USER_ID_SENTENCE, array(":userId" => $userId), ArticleAlbumInfo::class);
    }
    public function queryById($id)
    {
        return $this->getEntities(self::QUERY_BY_ID_SENTENCE, array(":id" => $id), ArticleAlbumInfo::class);
    }
}

