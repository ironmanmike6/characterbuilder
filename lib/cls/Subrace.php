<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/20/2015
 * Time: 7:53 PM
 */

class Subrace {
    private $traits = Array();
    private $name;
    private $id;
    private $saves = Array();
    private $race;

    public function __construct($name, $id, Race $race) {
        $this->name = $name;
        $this->id = $id;
        $this->race = $race;
    }

    public function addTrait(RacialTrait $trait) {
        $this->traits[] = $trait;
    }

    public function addSave($statid, $value) {
        $this->saves[$statid] = $value;
    }
}