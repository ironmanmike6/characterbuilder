<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 3:20 PM
 */

class History extends SavingThrow {

    public function __construct(Stat $stat, $proficiency = false) {
        parent::__construct("history", $stat, $proficiency);

    }

}