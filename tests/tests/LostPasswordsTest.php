<?php
/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */

class EmailMock extends Email {
    public function mail($to, $subject, $message, $headers)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }

    public $to;
    public $subject;
    public $message;
    public $headers;
}

class LossPasswordsDBTest extends \PHPUnit_Extensions_Database_TestCase
{


	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'chouin24');
    }
    public function test_construct() {
        $lostpasswords = new LostPasswords(self::$site);
        $this->assertInstanceOf('LostPasswords', $lostpasswords);
    }
    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/lostpassword.xml');
    }

    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    public function test_lostPassword() {
        $lp = new LostPasswords(self::$site);

        $mailer = new EmailMock();
        $this->assertContains("must be at least 8 characters long",
            $lp->newLostPassword("", "ab", "ab", $mailer));
        $this->assertContains("Passwords are not equal",
            $lp->newLostPassword("", "abcdefgh", "abcdefgg", $mailer));

        $this->assertContains("User ID or email does not exist.",
            $lp->newLostPassword("phil", "abcdefgh", "abcdefgh", $mailer));
        $this->assertContains("User ID or email does not exist.",
            $lp->newLostPassword("phil@phil.phil", "abcdefgh", "abcdefgh", $mailer));

        $lp->newLostPassword("cbowen@cse.msu.edu", "super477", "super477", $mailer);
        $table = $lp->getTableName();

        $sql = <<<SQL
SELECT * from $table where userid=8
SQL;

        $stmt = $lp->pdo()->prepare($sql);
        $stmt->execute(array());
        $this->assertEquals(1, $stmt->rowCount());

        $this->assertEquals("cbowen@cse.msu.edu", $mailer->to);
        $this->assertEquals("Reset your password", $mailer->subject);

    }

    public function test_removeLostPassword() {
        $lp = new LostPasswords(self::$site);

        $lostuser = $lp->removeLostPassword("abcdefghijklmnopqrstuvwxyzaaaaaa");
        $this->assertEquals("7", $lostuser['userid']);

        // Second time it should be removed
        $lostuser = $lp->removeLostPassword("abcdefghijklmnopqrstuvwxyzaaaaaa");
        $this->assertNull($lostuser);
    }

}

/// @endcond
?>
