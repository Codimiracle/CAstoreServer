<?php
namespace CAstore\Model\DAO;

/**
 * Static test suite.
 */
use PHPUnit\Framework\TestSuite;

class DAOSuite extends TestSuite
{

    /**
     * Constructs the test suite handler.
     */
    public function __construct()
    {
        parent::__construct("DAOSuite");
        
        $this->addTestFile(__DIR__."/UserInfoDAOImplTest.php");
        $this->addTestFile(__DIR__."/AppInfoDAOImplTest.php");
        $this->addTestFile(__DIR__."/CommentInfoDAOImplTest.php");
        $this->addTestFile(__DIR__."/FileInfoDAOImplTest.php");
        $this->addTestFile(__DIR__."/RoleInfoDAOImplTest.php");
    }

    /**
     * Creates the suite.
     */
    public static function suite()
    {
        return new self();
    }
}

