<?php
namespace CAstore\Model\DAO;

use CAstore\Model\Entity\RoleInfo;
use Deline\Model\Database\DataSource;
use Deline\Model\Database\MySQLDataSource;
use PHPUnit\Framework\TestCase;

/**
 * RoleInfoDAOImpl test case.
 */
class RoleInfoDAOImplTest extends TestCase
{

    /**
     *
     * @var DataSource
     */
    private $dataSource;

    /**
     *
     * @var RoleInfoDAO
     */
    private $roleInfoDAOImpl;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $database = array();
        $database["database_host"] = "localhost";
        $database["database_name"] = "test";
        $database["database_username"] = "root";
        $database["database_password"] = "Codimiracle855866";
        $this->roleInfoDAOImpl = new RoleInfoDAOImpl();
        $this->dataSource = new MySQLDataSource($database);
        $this->roleInfoDAOImpl->setDataSource($this->dataSource);
        $this->dataSource->getConnection()->exec("
            TRUNCATE `role`;");
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->roleInfoDAOImpl = null;
        $this->dataSource->getConnection()->exec("
            TRUNCATE `role`;");
    }

    /**
     * Tests RoleInfoDAOImpl->insert()
     */
    public function testInsert()
    {
        $role = new RoleInfo();
        $role->setPermission("aaaa,bbb,cc");
        $this->roleInfoDAOImpl->setTarget($role);
        self::assertNotNull($this->roleInfoDAOImpl->getTarget(), "target must not null.");
        $this->roleInfoDAOImpl->insert();
        $inserted = $this->roleInfoDAOImpl->query()[0];
        self::assertNotNull($inserted);
        self::assertEquals("aaaa,bbb,cc", $inserted->getPermission());
    }

    /**
     * Tests RoleInfoDAOImpl->delete()
     */
    public function testDelete()
    {
        $this->testInsert();
        $inserted = $this->roleInfoDAOImpl->query()[0];
        $this->roleInfoDAOImpl->setTarget($inserted);
        $this->roleInfoDAOImpl->delete();
        $deleted = $this->roleInfoDAOImpl->queryById($inserted->getId());
        self::assertNull($deleted);
    }

    /**
     * Tests RoleInfoDAOImpl->update()
     */
    public function testUpdate()
    {
        $this->testInsert();
        $inserted = $this->roleInfoDAOImpl->query()[0];
        $inserted->setPermission("console,sfsf,sfsf");
        $this->roleInfoDAOImpl->setTarget($inserted);
        $this->roleInfoDAOImpl->update();
        $result = $this->roleInfoDAOImpl->query()[0];
        self::assertNotNull($result);
        self::assertEquals("console,sfsf,sfsf", $result->getPermission());
        self::assertEquals($inserted->getId(), $result->getId());
    }

    /**
     * Tests RoleInfoDAOImpl->query()
     */
    public function testQuery()
    {
        $roleInfoList = $this->roleInfoDAOImpl->query();
        self::assertEquals(0, count($roleInfoList));
        $this->testInsert();
        $roleInfoList = $this->roleInfoDAOImpl->query();
        self::assertEquals(1, count($roleInfoList));
    }

    /**
     * Tests RoleInfoDAOImpl->queryById()
     */
    public function testQueryById()
    {
        $result = $this->roleInfoDAOImpl->queryById(1);
        self::assertNull(null, $result);
        $this->testInsert();
        $result = $this->roleInfoDAOImpl->queryById(1);
        self::assertNotNull($result);
    }
}

