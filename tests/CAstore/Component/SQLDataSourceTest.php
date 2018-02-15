<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-25
 * Time: 下午3:30
 */

namespace CAstore\Component;

use PHPUnit\Framework\TestCase;

class SQLDataSourceTest extends TestCase
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
        $this->accessor = new SQLDataSource($database);
    }

    public function testConnection() {
        self::assertNotNull($this->accessor->getConnection(), "DatabaseAccessor 的 connection 不能为空！");
    }


    protected function tearDown()
    {
        parent::tearDown();
    }
}