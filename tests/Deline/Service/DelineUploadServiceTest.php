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
        
        // TODO Auto-generated DelineUploadServiceTest::setUp()
        
        $this->uploadService = new DelineUploadService();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated DelineUploadServiceTest::tearDown()
        $this->uploadService = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests DelineUploadService->getInfoOf()
     */
    public function testGetInfoOf()
    {
        $_FILES["name"] = array("name" => "test.mp3", "type" => "audio/mp3", "size" => "11323", "tmp_name"=>"/tmp/test.mp3");
        $this->uploadService->getInfoOf("name");
    }

    /**
     * Tests DelineUploadService->getInfoGroupOf()
     */
    public function testGetInfoGroupOf()
    {
        // TODO Auto-generated DelineUploadServiceTest->testGetInfoGroupOf()
        $this->markTestIncomplete("getInfoGroupOf test not implemented");
        
        $this->uploadService->getInfoGroupOf(/* parameters */);
    }

    /**
     * Tests DelineUploadService->moveUploadedFileByField()
     */
    public function testMoveUploadedFileByField()
    {
        // TODO Auto-generated DelineUploadServiceTest->testMoveUploadedFileByField()
        $this->markTestIncomplete("moveUploadedFileByField test not implemented");
        
        $this->uploadService->moveUploadedFileByField(/* parameters */);
    }

    /**
     * Tests DelineUploadService->moveUploadedFileGroupByField()
     */
    public function testMoveUploadedFileGroupByField()
    {
        // TODO Auto-generated DelineUploadServiceTest->testMoveUploadedFileGroupByField()
        $this->markTestIncomplete("moveUploadedFileGroupByField test not implemented");
        
        $this->uploadService->moveUploadedFileGroupByField(/* parameters */);
    }
}

