<?php
use CAstore\Model\DAO\RoleInfoDAOImpl;
use CAstore\Model\Entity\RoleInfo;
use Deline\Model\Database\MySQLDataSource;
use PHPUnit\Framework\TestCase;
use Deline\Model\Database\DataSource;

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
     * @var RoleInfoDAOImpl
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
            TRUNCATE `role`;"
            );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->roleInfoDAOImpl = null;
        parent::tearDown();
    }

    /**
     * Tests RoleInfoDAOImpl->insert()
     */
    public function testInsert()
    {
        $role = new RoleInfo();
        $role->setPermission("aaaa,bbb,cc");
        $this->roleInfoDAOImpl->setTarget($role);
        $this->roleInfoDAOImpl->insert();
        $inserted = $this->roleInfoImpl->query()[0];
        assertNotNull($inserted);
        assertEquals("aaaa,bbb,cc", $inserted->getPermission());
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
        assertNull($deleted);
    }

    /**
     * Tests RoleInfoDAOImpl->update()
     */
    public function testUpdate()
    {
        // TODO Auto-generated RoleInfoDAOImplTest->testUpdate()
        $this->markTestIncomplete("update test not implemented");
        
        $this->roleInfoDAOImpl->update(/* parameters */);
    }

    /**
     * Tests RoleInfoDAOImpl->query()
     */
    public function testQuery()
    {
        // TODO Auto-generated RoleInfoDAOImplTest->testQuery()
        $this->markTestIncomplete("query test not implemented");
        
        $this->roleInfoDAOImpl->query(/* parameters */);
    }

    /**
     * Tests RoleInfoDAOImpl->queryById()
     */
    public function testQueryById()
    {
        // TODO Auto-generated RoleInfoDAOImplTest->testQueryById()
        $this->markTestIncomplete("queryById test not implemented");
        
        $this->roleInfoDAOImpl->queryById(/* parameters */);
    }
}

