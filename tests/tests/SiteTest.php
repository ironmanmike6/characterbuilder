<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function testConfigure() {
		$site = new Site();
		$site->dbConfigure("host", "user", "password", "prefix");

		$this->assertEquals("prefix", $site->getTablePrefix());

		$site->setEmail("email@mail.com");
		$this->assertEquals("email@mail.com", $site->getEmail());

		$site->setRoot("root");
		$this->assertEquals("root", $site->getRoot());
	}

	public function test_localize() {
		$site = new Site();
		$localize = require 'localize.inc.php';
		if(is_callable($localize)) {
			$localize($site);
		}
		$this->assertEquals('test_', $site->getTablePrefix());
	}
}

/// @endcond
?>
