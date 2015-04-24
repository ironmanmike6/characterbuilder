<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/22/2015
 * Time: 8:27 PM
 */

class Spells extends Table {
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "Spells");
    }

    /**
     * Get a sight by id
     * @param $id The sight by ID
     * @returns Sight object if successful, null otherwise.
     */
    public function getAll($id) {
        $sql =<<<SQL
SELECT * from $this->tableName
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));

        if($statement->rowCount() === 0) {
            return null;
        }

        return new $statement->fetchAll();
    }
}