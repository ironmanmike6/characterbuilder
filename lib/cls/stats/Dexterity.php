<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Dexterity extends Stat{

    public $savingthrow;
    public $acrobatics;
    public $sleightofhand;
    public $stealth;
    const statid = 2;

    public function __construct(Character $char, $value = 10) {
        parent::__construct("dexterity", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;
            case "acrobatics":
                $this->acrobatics->setProficient($proficiency);
                break;
            case "sleight of hand":
                $this->sleightofhand->setProficient($proficiency);
                break;
            case "stealth":
                $this->stealth->setProficient($proficiency);
                break;

        }
    }

}