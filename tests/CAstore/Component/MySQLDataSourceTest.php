<?php

namespace CAstore\Component;

use Deline\Model\Database\MySQLDataSource;
use PHPUnit\Framework\TestCase;

class MySQLDataSourceTest extends TestCase
{
    /**
     * @var DataSource
     */
    private $accessor;

    protected function setUp()
    {
        parent::setUp();
        $database = array();
        $database["database_host"] = "localhost";
        $database["database_name"] = "ca_appstore";
        $database["database_username"] = "root";
        $database["database_password"] = "Codimiracle855866";
        $this->accessor = new MySQLDataSource($database);
    }

    public function testConnection() {
        self::assertNotNull($this->accessor->getConnection(), "DatabaseAccessor 的 connection 不能为空！");
    }


    protected function tearDown()
    {
        parent::tearDown();
    }
}
