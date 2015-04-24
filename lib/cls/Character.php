<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:48 PM
 */

class Character {
    private $name = "";
    private $charNum = -1;

    public $strength;
    public $dexterity;
    public $constitution;
    public $intelligence;
    public $wisdom;
    public $charisma;

    private $race = null;
    private $subrace = null;

    public function __construct() {

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
     * @return int
     */
    public function getCharNum()
    {
        return $this->charNum;
    }

    /**
     * @param int $charNum
     */
    public function setCharNum($charNum)
    {
        $this->charNum = $charNum;
    }

    public function setStats($key, $value) {
        switch($key) {
            case "strength":
                $this->strength->setValue($value);
                break;
            case "dexterity":
                $this->dexterity->setValue($value);
                break;
            case "constitution":
                $this->constitution->setValue($value);
                break;
            case "intelligence":
                $this->intelligence->setValue($value);
                break;
            case "wisdom":
                $this->wisdom->setValue($value);
                break;
            case "charisma":
                $this->charisma->setValue($value);
                break;
        }
    }

    public function setProficiency($key, $savingthrow, $proficiency) {
        switch($key) {
            case "strength":
                $this->strength->setProficiency($savingthrow,$proficiency);
                break;
            case "dexterity":
                $this->dexterity->setProficiency($savingthrow,$proficiency);
                break;
            case "constitution":
                $this->constitution->setProficiency($savingthrow,$proficiency);
                break;
            case "intelligence":
                $this->intelligence->setProficiency($savingthrow,$proficiency);
                break;
            case "wisdom":
                $this->wisdom->setProficiency($savingthrow,$proficiency);
                break;
            case "charisma":
                $this->charisma->setProficiency($savingthrow,$proficiency);
                break;
        }
    }

    /**
     * @return null
     */
    public function getSubrace()
    {
        return $this->subrace;
    }

    /**
     * @param null $subrace
     */
    public function setSubrace($subrace)
    {
        $this->subrace = $subrace;
    }

    /**
     * @return null
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param null $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }


    public function getProficiencyBonus() {
        return 3;
    }



}