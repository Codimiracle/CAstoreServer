<?php
namespace CAstore\Model\DAO;

use CAstore\Model\Entity\FileInfo;
use Deline\Model\DAO\AbstractDAO;
use PDOException;

class FileInfoDAOImpl extends AbstractDAO implements FileInfoDAO
{

    const INSERT = "INSERT INTO file(targetId, path, size, mimeType, uploadedTime, updatedTime) VALUES(:targetId, :path, :size, :mimeType, NOW(), NOW())";

    const UPDATE = "UPDATE file SET targetId = :targetId, path = :path, size = :size, mimeType = :mimeType, updatedTime = NOW() WHERE id = :id";

    const DELETE = "DELETE FROM file WHERE id = :id";

    const QUERY = "SELECT * FROM file";

    const QUERY_BY_ID = "SELECT * FROM file WHERE id = :id";

    const QUERY_BY_TARGET_ID = "SELECT * FROM file WHERE targetId = :targetId";

    public function getLastInsertedId()
    {
        return $this->lastInsertedId;
    }
    /**
     *
     * @return FileInfo
     * {@inheritdoc}
     * @see \Deline\Model\DAO\AbstractDAO::getTarget()
     */
    public function getTarget()
    {
        return parent::getTarget();
    }

    /**
     *
     * @param FileInfo $target
     * {@inheritdoc}
     * @see \Deline\Model\DAO\AbstractDAO::setTarget()
     */
    public function setTarget($target)
    {
        parent::setTarget($target);
    }

    public function insert()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::INSERT);
            $prepared->bindValue(":targetId", $this->getTarget()
                ->getTargetId());
            $prepared->bindValue(":path", $this->getTarget()
                ->getPath());
            $prepared->bindValue(":size", $this->getTarget()
                ->getSize());
            $prepared->bindValue(":mimeType", $this->getTarget()
                ->getMimeType());
            $prepared->execute();
            $this->lastInsertedId = $connection->lastInsertId();
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function update()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::UPDATE);
            $prepared->bindValue(":targetId", $this->getTarget()
                ->getTargetId());
            $prepared->bindValue(":path", $this->getTarget()
                ->getPath());
            $prepared->bindValue(":size", $this->getTarget()
                ->getSize());
            $prepared->bindValue(":mimeType", $this->getTarget()
                ->getMimeType());
            $prepared->bindValue(":id", $this->getTarget()
                ->getId());
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
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::DELETE);
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
        return $this->getEntities(self::QUERY, array(), FileInfo::class);
    }

    public function queryById($id)
    {
        return $this->getEntity(self::QUERY_BY_ID, array(
            ":id" => $id
        ), FileInfo::class);
    }

    public function queryByTargetId($targetId)
    {
        return $this->getEntities(self::QUERY_BY_TARGET_ID, array(
            ":targetId" => $targetId
        ), FileInfo::class);
    }
}

