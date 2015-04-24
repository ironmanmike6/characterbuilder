<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/1/2015
 * Time: 6:15 AM
 */

class StatSave {

    private $save = "";
    private $stat;
    private $proficient;

    public function __construct($name, Stat $stat) {
        $this->save = $name;
        $this->stat = $stat;
        $this->proficient = false;

    }

    /**
     * @return string
     */
    public function getSave()
    {
        return $this->save;
    }

    /**
     * @param string $save
     */
    public function setSave($save)
    {
        $this->save = $save;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        $val = $this->stat->getMod();

        if($this->proficient) {
            $val += $this->stat->getCharacter()->getProficiencyBonus();
        }
        return $val;

    }

    public function setProficiency($bool) {
        $this->proficient = $bool;
    }

    public function getProficiency() {
        return $this->proficient;
    }

}