<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Charisma extends Stat{

    public $savingthrow;
    public $deception;
    public $intimidation;
    public $performance;
    public $persuasion;
    const statid = 6;

    public function __construct(Character $char, $value = 10) {
        parent::__construct("charisma", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;
            case "deception":
                $this->deception->setProficient($proficiency);
                break;
            case "intimidation":
                $this->intimidation->setProficient($proficiency);
                break;
            case "performance":
                $this->performance->setProficient($proficiency);
                break;
            case "persuasion":
                $this->persuasion->setProficient($proficiency);
                break;

        }
    }

}