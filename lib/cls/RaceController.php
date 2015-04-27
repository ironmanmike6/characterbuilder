<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/26/2015
 * Time: 5:59 PM
 */

class RaceController {

    private $raceId = null;
    private $subraceId = null;
    private $char;
    private $site;

    public function __construct($raceId, $subraceId, Character $character, Site $site) {
        if(is_numeric($raceId)) {
            $this->raceId = $raceId;
        }
        if(is_numeric($subraceId)) {
            $this->subraceId = $subraceId;
        }
        $this->char = $character;
        $this->site = $site;
    }

    public function setRace() {
        $races = new Races($this->site);

        $race = $races->getRaceById($this->raceId);
        $this->char->setRace($race);
    }

}