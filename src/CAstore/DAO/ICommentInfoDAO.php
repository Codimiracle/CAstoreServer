<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-26
 * Time: 下午9:38
 */
namespace CAstore\DAO;

use CAstore\Entity\CommentInfo;

class ICommentInfoDAO extends AbstractDAO implements CommentInfoDAO
{

    const INSERT_CONTENT = "INSERT INTO content(title, name, content) VALUES ('comment_title', 'comment_name', :content)";

    const INSERT_COMMENT = "INSERT INTO comment(cid, ccid, createdTime, uid) VALUES (:cid, :ccid, now(), :uid)";

    const UPDATE_CONTENT = "UPDATE content SET content = :content WHERE id = (SELECT cid FROM comment WHERE id = :id)";

    const DELETE_CONTENT = "DELETE FROM content WHERE id = (SELECT cid FROM comment WHERE id = :id)";

    const DELETE_COMMENT = "DELETE FROM comment WHERE id = :id";

    const QUERY = "SELECT * FROM comment_info";

    const QUERY_BY_ID = "SELECT * FROM comment_info WHERE id = :id";

    const QUERY_BY_CONTENT_ID = "SELECT * FROM comment_info WHERE contentId = :contentId";

    /**
     *
     * @return CommentInfo
     */
    public function getTarget()
    {
        return parent::getTarget(); // TODO: Change the autogenerated stub
    }

    public function queryByContentId($content_id)
    {
        $this->getEntities(self::QUERY_BY_CONTENT_ID, array(
            ":contentId" => $content_id
        ), CommentInfo::class);
    }

    public function insert()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::INSERT_CONTENT);
            $prepared->bindValue(":content", $this->getTarget()
                ->getContent());
            $prepared->execute();
            $inserted_id = $connection->lastInsertId(":id");
            $prepared = $connection->prepare(self::INSERT_COMMENT);
            $prepared->bindValue(":cid", $inserted_id);
            $prepared->bindValue(":ccid", $this->getTarget()
                ->getContentId());
            $prepared->bindValue(":uid", $this->getTarget()
                ->getUserId());
            $prepared->execute();
            $connection->commit();
        } catch (\PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function delete()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::DELETE_CONTENT);
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
            $prepared->execute();
            $prepared = $connection->prepare(self::DELETE_COMMENT);
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
            $prepared->execute();
            $connection->commit();
        } catch (\PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function update()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::UPDATE_CONTENT);
            $prepared->bindValue(":content", $this->getTarget()
                ->getContent());
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
            $prepared->execute();
            $connection->commit();
        } catch (\PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function query()
    {
        return $this->getEntities(self::QUERY, array(), CommentInfo::class);
    }

    public function queryById($id)
    {
        return $this->getEntity(self::QUERY_BY_ID, array(
            ":id" => $id
        ), CommentInfo::class);
    }
}