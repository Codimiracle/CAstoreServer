<?php
namespace Deline\Service;

use PHPUnit\Framework\TestCase;

/**
 * DelineUploadService test case.
 */
class DelineUploadServiceTest extends TestCase
{

    /**
     *
     * @var DelineUploadService
     */
    private $uploadService;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        file_put_contents("/tmp/testa.css", ".test {}");
        file_put_contents("/tmp/testb.css", ".test {}");
        file_put_contents("/tmp/testc.css", ".test {}");
        $_FILES["field"] = array(
            "name" => "testa.css",
            "type" => "text/css",
            "size" => 11323,
            "tmp_name" => "/tmp/testa.css",
            "error" => 0
        );
        $_FILES["fields"] = array(
            "name" => array(
                "testb.css",
                "testc.css"
            ),
            "type" => array(
                "text/css",
                "text/css"
            ),
            "size" => array(
                12311,
                412
            ),
            "tmp_name" => array(
                "/tmp/testb.css",
                "/tmp/testc.css"
            ),
            "error" => array(
                0,
                0
            )
        );
        // TODO Auto-generated DelineUploadServiceTest::setUp()
        $this->uploadService = new DelineUploadService();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        unlink("/tmp/testa.css");
        unlink("/tmp/testb.css");
        unlink("/tmp/testc.css");
        $_FILES = array();
        $this->uploadService = null;
        parent::tearDown();
    }

    /**
     * Tests DelineUploadService->getInfoOf()
     */
    public function testGetInfoOfField()
    {
        $info = $this->uploadService->getUploadInfo("field");
        self::assertEquals("testa.css", $info["name"]);
        self::assertEquals("text/css", $info["type"]);
        self::assertEquals(11323, $info["size"]);
        self::assertEquals("/tmp/testa.css", $info["tmp_name"]);
    }

    /**
     * Tests DelineUploadService->getInfoOf()
     */
    public function testGetInfoOfFieldError()
    {
        $_FILES["field"]["error"] = 23013;
        $info = $this->uploadService->getUploadInfo("field");
        self::assertNotNull($info);
    }

    /**
     * Tests DelineUploadService->getInfoGroupOf()
     */
    public function testGetInfoOfGroup()
    {
        $infos = $this->uploadService->getUploadInfoGroup("fields");
        self::assertCount(2, $infos);
        self::assertEquals("testb.css", $infos[0]["name"], "the name must be 'testb.css'.");
        self::assertEquals("text/css", $infos[0]["type"], "the type must be 'text/css'.");
        self::assertEquals(12311, $infos[0]["size"], "the size must be 12311");
        self::assertEquals("/tmp/testb.css", $infos[0]["tmp_name"], "the tmp_name must be '/tmp/testb.css'");
        self::assertEquals("testc.css", $infos[1]["name"], "the name must be 'testc.css'.");
        self::assertEquals("text/css", $infos[1]["type"], "the type must be 'text/css'.");
        self::assertEquals(412, $infos[1]["size"], "the size must be 12311");
        self::assertEquals("/tmp/testc.css", $infos[1]["tmp_name"], "the tmp_name must be '/tmp/testc.css'");
    }

    /**
     * Tests DelineUploadService->getInfoGroupOf()
     */
    public function testGetInfoGroupOfFiledError()
    {
        $_FILES["fields"]["error"] = array(
            6566,
            23423
        );
        $infos = $this->uploadService->getUploadInfoGroup("fields");
        self::assertCount(2, $infos);
    }

    /**
     * Tests DelineUploadService->moveUploadedFileByField()
     */
    public function testMoveUploadedFileByField()
    {
        $filename = $this->uploadService->moveUploadedFileByField("field", "/tmp");
        self::assertNotFalse($filename, "you should be return the name of target file.");
        self::assertFileExists("/tmp/" . $filename, "you should be move the file to the \$dir");
    }

    public function testMoveUploadedFileByInfo()
    {
        $info = $this->uploadService->getUploadInfo("field");
        $filename = $this->uploadService->moveUploadedFileByInfo($info, "/tmp");
        self::assertNotFalse($filename, "you should be return the name of target file.");
        self::assertFileExists("/tmp/" . $filename, "you should be move the file to the \$dir");
    }

    public function testIsMimeType()
    {
        self::assertTrue($this->uploadService->isMimeType("field", "text/*"));
        self::assertTrue($this->uploadService->isMimeType("field", "text/css"));
        self::assertTrue($this->uploadService->isMimeType("fields", "text/css"));
    }
}

