<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\AbstractDAO;
use PDOException;
use CAstore\Model\Entity\RoleInfo;

class RoleInfoDAOImpl extends AbstractDAO implements RoleInfoDAO
{

    const INSERT_SENTENCE = "INSERT INTO role(permission) VALUES (:permission)";

    const DELETE_SENTENCE = "DELETE FROM role WHERE id = :id";

    const UPDATE_SENTENCE = "UPDATE role SET permission = :permission WHERE id = :id";

    const QUERY_SENTENCE = "SELECT * FROM role";

    const QUERY_BY_ID_SENTENCE = "SELECT * FROM role WHERE id = :id";

    /**
     *
     * @return RoleInfo
     * {@inheritdoc}
     * @see \Deline\Model\DAO\AbstractDAO::getTarget()
     */
    public function getTarget()
    {
        return parent::getTarget();
    }

    /**
     *
     * @param RoleInfo $target
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
            $prepared = $connection->prepare(self::INSERT_SENTENCE);
            $prepared->bindValue(":permission", $this->getTarget()->getPermission());
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

    public function update()
    {
        $connection = $this->getDataSource()->getConnection();
        try {
            $connection->beginTransaction();
            $prepared = $connection->prepare(self::UPDATE_SENTENCE);
            $prepared->bindValue(":permission", $this->getTarget()
                ->getPermission());
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
        return $this->getEntities(self::QUERY_SENTENCE, array(), RoleInfo::class);
    }

    public function queryById($id)
    {
        return $this->getEntity(self::QUERY_BY_ID_SENTENCE, array(
            ":id" => $id
        ), RoleInfo::class);
    }
}