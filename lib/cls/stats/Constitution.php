<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Constitution extends Stat{

    public $savingthrow;
    const statid = 3;


    public function __construct(Character $char, $value = 10) {
        parent::__construct("constitution", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;

        }
    }

}