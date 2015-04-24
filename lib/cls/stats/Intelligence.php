<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Intelligence extends Stat{

    public $savingthrow;
    public $arcana;
    public $history;
    public $investigation;
    public $nature;
    public $religion;
    const statid = 4;

    public function __construct(Character $char, $value = 10) {
        parent::__construct("intelligence", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;
            case "arcana":
                $this->arcana->setProficient($proficiency);
                break;
            case "history":
                $this->history->setProficient($proficiency);
                break;
            case "investigation":
                $this->investigation->setProficient($proficiency);
                break;
            case "nature":
                $this->nature->setProficient($proficiency);
                break;
            case "religion":
                $this->religion->setProficient($proficiency);
                break;

        }
    }

}