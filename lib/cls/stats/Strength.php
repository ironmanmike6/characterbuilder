<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:49 PM
 */

class Strength extends Stat{

    public $savingthrow;
    public $athletics;
    const statid = 1;

    public function __construct(Character $char, $value = 10) {
        parent::__construct("strength", $char, $value);
    }

    public function setProficiency($savingThrow, $proficiency) {
        echo $savingThrow;
        switch($savingThrow) {
            case "saving throws":
                $this->savingthrow->setProficient($proficiency);
                break;
            case "athletics":
                $this->athletics->setProficient($proficiency);
                break;

        }
    }

}