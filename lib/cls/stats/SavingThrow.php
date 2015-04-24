<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 3:11 PM
 */

class SavingThrow {
    private $name = "";
    private $stat;
    private $proficient;
    private $expertise;

    public function __construct($name, Stat $stat, $proficient = false) {
        $this->name = $name;
        $this->stat = $stat;
        $this->proficient = $proficient;
        $this->expertise = false;

    }

    public function getValue() {
        $val = $this->stat->getMod();

        if($this->proficient) {
            $val += $this->stat->getCharacter()->getProficiencyBonus();
        }
        return $val;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * @param mixed $stat
     */
    public function setStat($stat)
    {
        $this->stat = $stat;
    }

    /**
     * @return mixed
     */
    public function getProficient()
    {
        return $this->proficient;
    }

    /**
     * @param mixed $proficient
     */
    public function setProficient($proficient)
    {
        $this->proficient = $proficient;
    }

    /**
     * @return mixed
     */
    public function getExpertise()
    {
        return $this->expertise;
    }

    /**
     * @param mixed $expertise
     */
    public function setExpertise($expertise)
    {
        $this->expertise = $expertise;
    }


}