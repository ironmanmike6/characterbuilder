<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/1/2015
 * Time: 5:41 AM
 */

class Characters extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "characters");
    }

    public function getCharactersForUser($userid) {
        $sql = <<<SQL
SELECT * FROM $this->tableName
WHERE userid=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid));

        $results = Array();

        foreach($statement as $row) {

            $factory = new CharacterFactory();
            $char = $factory->create($row);

            $results[] = $char;
        }
        return $results;

    }

    public function getCharacterForId($id) {
        $sql = <<<SQL
SELECT * FROM $this->tableName
WHERE id=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id));

        $factory = new CharacterFactory();
        $char = $factory->create($statement->fetch(PDO::FETCH_ASSOC));


        return $char;
    }

    public function saveCharacter(Character $char,User $user) {
        $stats = get_object_vars($char);
        $domtree = new DOMDocument('1.0', 'UTF-8');

        /* create the root element of the xml tree */
        $xmlRoot = $domtree->createElement("xml");
        /* append it to the document created */
        $xmlRoot = $domtree->appendChild($xmlRoot);

        $currentTrack = $domtree->createElement("character");
        $currentTrack = $xmlRoot->appendChild($currentTrack);

        /* you should enclose the following two lines in a cicle */
        $currentTrack->appendChild($domtree->createElement('name',$char->getName()));

        $statTag = $domtree->createElement("stats");
        $currentTag = $xmlRoot->appendChild($statTag);


        foreach($stats as $stat) {
            $statName = $stat->getName();
            $statVal = $stat->getValue();

            $statTag=$domtree->createElement($statName, $statVal);
            $currentTag->appendChild($statTag);

            $saveTag = $domtree->createElement("saves");
            $saveTag = $statTag->appendChild($saveTag);

            $saves = get_object_vars($stat);

            foreach($saves as $save) {
                $saveName = str_replace(" ", "-",$save->getName());
                if($save->getProficient()) {
                    $saveVal = 1;
                } else {
                    $saveVal = 0;
                }

                //echo $saveName."  ".$saveVal."<br>";
                $saveTag->appendChild($domtree->createElement($saveName, $saveVal));
            }
        }


        /* get the xml printed */
        //header('Content-type: text/xml');
        //echo $domtree->saveXML();


        $id = $user->getId();
        $name = $char->getName();
        $info = $domtree->saveXML();
        $charNum = $char->getCharNum();


if($charNum < 0) {
    $sql = <<<SQL
INSERT INTO $this->tableName(userid, name, info)
VALUES(?,?,?);
SQL;

    $pdo = $this->pdo();
    $statement = $pdo->prepare($sql);
    $statement->execute(array($id, $name, $info));
    $char->setCharNum($pdo->lastInsertId());
}
else {
    $sql = <<<SQL
UPDATE $this->tableName
SET name=?, info=?
WHERE id=?
SQL;

    $pdo = $this->pdo();
    $statement = $pdo->prepare($sql);
    $statement->execute(array($name, $info, $charNum));

}

    }
}