<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\AbstractDAO;
use PDOException;
use CAstore\Model\Entity\ArticleInfo;

class ArticleInfoDAOImpl extends AbstractDAO implements ArticleInfoDAO
{

    const INSERT_CONTENT = "INSERT INTO content(title, name, content, createdTime, updatedTime) VALUES (:title, 'article_content', :description, NOW(),NOW())";

    const INSERT_SENTENCE = "INSERT INTO article(cid, uid) VALUES (:cid, :uid)";

    const QUERY_SENTENCE = "SELECT * FROM article_info";

    const QUERY_BY_TITLE_SENTENCE = "SELECT * FROM article_info WHERE title like :title";

    const QUERY_BY_CONTENT_ID_SENTENCE = "SELECT * FROM article_info WHERE contentId = :content";

    const QUERY_BY_ID = "SELECT * FROM article_info WHERE id = :id";

    const DELETE_CONTENT = "DELETE FROM content WHERE id = (SELECT cid FROM article WHERE id = :id)";

    const DELETE_SENTENCE = "DELETE FROM article WHERE id = :id";

    const UPDATE_CONTENT = "UPDATE content SET title = :title, name = :name, content = :description, updatedTime = NOW() WHERE id = (SELECT cid FROM article WHERE id = :id)";

    private $lastInsertedId;

    /**
     *
     * @return ArticleInfo
     * {@inheritdoc}
     * @see \Deline\Model\DAO\DataAccessObject::getTarget()
     */
    public function getTarget()
    {
        return parent::getTarget();
    }

    public function getLastInsertedId()
    {
        return $this->lastInsertedId;
    }

    public function insert()
    {
        $connection = $this->getDataSource()->getConnection();
        $connection->beginTransaction();
        try {
            $prepared = $connection->prepare(self::INSERT_CONTENT);
            $prepared->bindValue(":title", $this->getTarget()
                ->getTitle());
            $prepared->bindValue(":description", $this->getTarget()
                ->getContent());
            $prepared->execute();
            $this->lastInsertedId = $connection->lastInsertId();
            $prepared = $connection->prepare(self::INSERT_SENTENCE);
            $prepared->bindValue(":cid", $this->lastInsertedId);
            $prepared->bindValue(":uid", $this->getTarget()
                ->getUserId());
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
            $prepared = $connection->prepare(self::UPDATE_CONTENT);
            $prepared->bindValue(":title", $this->getTarget()
                ->getTitle());
            $prepared->bindValue(":description", $this->getTarget()
                ->getContent());
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
            $prepared = $connection->prepare(self::DELETE_CONTENT);
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
            $prepared->execute();
            $prepared = $connection->prepare(self::DELETE_SENTENCE);
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
            $prepared->execute();
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function query()
    {
        return $this->getEntities(self::QUERY_SENTENCE, array(), ArticleInfo::class);
    }

    public function queryById($id)
    {
        return $this->getEntity(self::QUERY_BY_ID, array(
            ":id" => $id
        ), ArticleInfo::class);
    }

    public function queryByTitle($title)
    {
        return $this->getEntities(self::QUERY_BY_TITLE_SENTENCE, array(
            ":title" => $title
        ), ArticleInfo::class);
    }

    public function queryByContentId($contentId)
    {
        return $this->getEntity(self::QUERY_BY_CONTENT_ID_SENTENCE, array(
            ":contentId" => $contentId
        ), ArticleInfo::class);
    }
}

