<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/1/2015
 * Time: 6:01 AM
 */

class Stat {

    private $name = "";
    private $value;
    private $character;

    /**
     * @return Character
     */
    public function getCharacter()
    {
        return $this->character;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


    public function __construct($name, Character $char, $value = 10) {
        $this->name = $name;
        $this->value = $value;
        $this->character = $char;
    }



    public function getMod() {
        $val = ($this->value - 10) / 2;
        $val = floor($val);
        return sprintf("%+d",$val);
    }

    public function setProficiency($savingThrow, $proficiency) {

    }



}