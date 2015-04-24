<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Wisdom extends Stat{

    public $savingthrow;
    public $animalhandling;
    public $insight;
    public $medicine;
    public $perception;
    public $survival;
    const statid = 5;

    public function __construct(Character $char, $value = 10) {
        parent::__construct("wisdom", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;
            case "animal handling":
                $this->animalhandling->setProficient($proficiency);
                break;
            case "insight":
                $this->insight->setProficient($proficiency);
                break;
            case "medicine":
                $this->medicine->setProficient($proficiency);
                break;
            case "perception":
                $this->perception->setProficient($proficiency);
                break;
            case "survival":
                $this->survival->setProficient($proficiency);
                break;

        }
    }
}