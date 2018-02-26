<?php
namespace CAstore;

use PHPUnit\Framework\TestSuite;

/**
 * Static test suite.
 */
class CAstoreSuite extends TestSuite
{

    /**
     * Constructs the test suite handler.
     */
    public function __construct()
    {
        parent::__construct('CAstoreSuite');
        $this->addTestFile(__DIR__."/Model/DAO/DAOSuite.php");
    }

    /**
     * Creates the suite.
     */
    public static function suite()
    {
        return new self();
    }
}

