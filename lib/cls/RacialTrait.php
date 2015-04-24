<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/20/2015
 * Time: 7:56 PM
 */

class RacialTrait extends TraitBase {
    private $race;

    public function __construct($name, $description, $id, Race $race) {
        parent::__construct($name, $description, $id);
        $this->race = $race;

    }

    /**
     * @return Race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param Race $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

}