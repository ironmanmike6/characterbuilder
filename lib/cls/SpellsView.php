<?php


class SpellsView {
    public function __construct(Site $site, $request = null) {
        $this->site = $site;
        $this->spells = new Spells($site);
        if(isset($request['sort'])) {
            $this->sortMethod = $request['sort'];
            if($this->sortMethod < 0) {
                $this->sortMethod = 0;
            }
        } else {
            $this->sortMethod = self::sortName;
        }
        if(isset($request['reverse'])) {
            $this->reverseSort = $request['reverse'];
        } else {
            $this->reverseSort = false;
        }

    }
    const sortName = 0; //default
    const sortSchool = 1; // Pointless, don't link to
    const sortLevel = 2;
    const sortSchoolLevel = 3;
    const sortLevelSchool = 4;
    private $sortMethod;
    private $reverseSort;

    public function presentSpells() {
        $schools = $this->getSchools();
        $table = $this->spells->getTableName();
        $sql = <<<SQL
SELECT * from $table
SQL;
        if($this->sortMethod == self::sortSchool) {
            $sql .= " ORDER BY schoolsid";
        }
        else if($this->sortMethod ==self::sortLevel) {
            $sql .= " ORDER BY level, name";
        }
        else if($this->sortMethod ==self::sortSchoolLevel) {
            $sql .= " ORDER BY schoolsid, level";
        }
        else if($this->sortMethod ==self::sortLevelSchool) {
            $sql .= " ORDER BY level, schoolsid";
        } else {
            $sql .= " ORDER BY name";
        }
        if($this->reverseSort) {
            $sql .=" DESC";
        }


        $pdo = $this->site->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $html = "";

        $rows = $statement->fetchAll();
        foreach($rows as $row) {
            $spellName = $row['name'];
            $description = $row['description'];
            $level = $row['level'];
            $castingtime = $row['castingtime'];
            $range = $row['spellrange'];
            $components = $row['components'];
            $duration = $row['duration'];
            $schoolid = $row['schoolsid'];
            $school = ucwords($schools[$schoolid]);
            $book = $row['book'];

            $spellHtml = <<<HTML
<div class="spell">
<h2>$spellName</h2>
<p class="schoollevel">$school - Level $level</p>
<p><b>Casting Time: </b>$castingtime</p>
<p><b>Range: </b> $range</p>
<p><b>Components: </b>$components</p>
<p><b>Duration: </b>$duration</p>
<p><b>Book: </b> $book</p>
<p>&nbsp;</p>
<p>$description</p>
</div>
HTML;

            $html .=$spellHtml;

        }



        return $html;
    }

    private function getSchools() {
        $sql = <<<SQL
SELECT * from schools
SQL;
        $pdo = $this->site->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $schools = array();
        foreach($rows as $row) {
            $schools[$row['id']] = $row['name'];
        }
        return $schools;
    }
    private $spells;
    private $site;
}