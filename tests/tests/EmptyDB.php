<?php
/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */
require_once 'DatabaseTestBase.php';

class EmptyDBTest extends DatabaseTestBase
{
	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = pdo_connect();
		
		//$users = new Users(get_course()->get_tableprefix());
		//$sql = $users->drop_sql() . $users->create_sql();
		//$pdo->query($sql);

        return $this->createDefaultDBConnection($pdo, 'cse335-test');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return new PHPUnit_Extensions_Database_DataSet_DefaultDataSet();

        //return $this->createFlatXMLDataSet(dirname(__FILE__) . 
		//	'/db/users.xml');
    }
	
}

/// @endcond
?>
