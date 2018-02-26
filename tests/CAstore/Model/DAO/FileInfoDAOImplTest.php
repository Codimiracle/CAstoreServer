<?php
namespace CAstore\Model\DAO;

use CAstore\Model\Entity\FileInfo;
use Deline\Model\Database\MySQLDataSource;
use PHPUnit\Framework\TestCase;

/**
 * FileInfoDAOImpl test case.
 */
class FileInfoDAOImplTest extends TestCase
{

    /**
     *
     * @var FileInfoDAOImpl
     */
    private $fileInfoDAOImpl;

    private $dataSource;

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
        $this->fileInfoDAOImpl = new FileInfoDAOImpl();
        $this->dataSource = new MySQLDataSource($database);
        $this->fileInfoDAOImpl->setDataSource($this->dataSource);
        $this->dataSource->getConnection()->exec("
            TRUNCATE `file`;");
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->fileInfoDAOImpl = null;
        $this->dataSource->getConnection()->exec("
            TRUNCATE `file`;");
    }

    /**
     * Tests FileInfoDAOImpl->insert()
     */
    public function testInsert()
    {
        $fileInfo = new FileInfo();
        $fileInfo->setMimeType("audio/mp3");
        $fileInfo->setPath("images/User/Demo.mp3");
        $fileInfo->setSize(13034242);
        $fileInfo->setTargetId(11);
        $this->fileInfoDAOImpl->setTarget($fileInfo);
        $this->fileInfoDAOImpl->insert();
        $inserted = $this->fileInfoDAOImpl->query()[0];
        self::assertEquals("audio/mp3", $inserted->getMimeType());
        self::assertEquals("images/User/Demo.mp3", $inserted->getPath());
        self::assertEquals(13034242, $inserted->getSize());
        self::assertEquals(11, $inserted->getTargetId());
    }

    /**
     * Tests FileInfoDAOImpl->update()
     */
    public function testUpdate()
    {
        $this->testInsert();
        $inserted = $this->fileInfoDAOImpl->query()[0];
        $inserted->setMimeType("application/x-javascript");
        $inserted->setPath("js/aa.js");
        $inserted->setTargetId(1);
        $inserted->setSize(5034);
        $this->fileInfoDAOImpl->setTarget($inserted);
        $this->fileInfoDAOImpl->update();
        $updated = $this->fileInfoDAOImpl->query()[0];
        self::assertEquals($inserted->getMimeType(), $updated->getMimeType());
        self::assertEquals($inserted->getPath(), $updated->getPath());
        self::assertEquals($inserted->getTargetId(), $updated->getTargetId());
        self::assertEquals($inserted->getSize(), $updated->getSize());
    }

    /**
     * Tests FileInfoDAOImpl->delete()
     */
    public function testDelete()
    {
        $this->testInsert();
        $inserted = $this->fileInfoDAOImpl->query()[0];
        self::assertNotNull($inserted);
        $this->fileInfoDAOImpl->setTarget($inserted);
        $this->fileInfoDAOImpl->delete();
        $deleted = $this->fileInfoDAOImpl->query();
        self::assertEmpty($deleted);
    }

    /**
     * Tests FileInfoDAOImpl->queryById()
     */
    public function testQueryById()
    {
        $this->testInsert();
        $data = $this->fileInfoDAOImpl->queryById(1);
        self::assertEquals(1, $data->getId());
    }

    /**
     * Tests FileInfoDAOImpl->queryByTargetId()
     */
    public function testQueryByTargetId()
    {
        $this->testInsert();
        $data = $this->fileInfoDAOImpl->queryByTargetId(11);
        self::assertNotEmpty($data);
        self::assertEquals(11, $data[0]->getTargetId());
    }
}

