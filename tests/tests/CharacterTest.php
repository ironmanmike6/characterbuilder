<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class CharacterTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$character = new CharacterOld();

		$this->assertEquals(10, $character->getStrength());
		$this->assertEquals(10, $character->getDexterity());
		$this->assertEquals(10, $character->getIntelligence());
		$this->assertEquals(10, $character->getConstitution());
		$this->assertEquals(10, $character->getWisdom());
		$this->assertEquals(10, $character->getCharisma());
	}
}

/// @endcond
?>
