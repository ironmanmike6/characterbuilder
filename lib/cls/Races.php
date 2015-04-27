<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/22/2015
 * Time: 8:27 PM
 */

class Races extends Table {
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "race");
    }

    public function getAllRaces() {
        $race = $this->getTableName();

        $raceStats = new Race_Stats($this->site);
        $race_stats = $raceStats->getTableName();

        $statsVar = new Stats($this->site);
        $stats = $statsVar->getTableName();

        $trueSQL= "select $stats.id as statsid, $race_stats.value, $race.name as racename, $race.id from $race, $stats, $race_stats where $race.id = raceid and $stats.id = statsid";

        $pdo = $this->pdo();
        $statement = $pdo->prepare($trueSQL);
        $statement->execute();

        $results = array();

        foreach($statement as $row) {

            $statsid = $row['statsid'];
            $value = $row['value'];
            $id = $row['id'];
            $racename = $row['racename'];

            $race = new Race($racename, $id);

            $race->addSave($statsid, $value);

            $results[] = $race;
        }

        return $results;
    }

    public function getRaceById($id) {
        $race = $this->getTableName();

        $raceStats = new Race_Stats($this->site);
        $race_stats = $raceStats->getTableName();

        $statsVar = new Stats($this->site);
        $stats = $statsVar->getTableName();

        $trueSQL= "select $stats.id as statsid, $race_stats.value, $race.name as racename, $race.id from $race, $stats, $race_stats where $race.id = raceid and $stats.id = statsid and $race.id =?";

        $pdo = $this->pdo();
        $statement = $pdo->prepare($trueSQL);
        $statement->execute(array($id));

        if($statement->rowCount() < 1) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $statsid = $row['statsid'];
        $value = $row['value'];
        $id = $row['id'];
        $racename = $row['racename'];

        $race = new Race($racename, $id);

        $race->addSave($statsid, $value);

        return $race;
    }

}