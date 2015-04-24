<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/20/2015
 * Time: 7:53 PM
 */

class Race {

    private $traits = Array();
    private $name;
    private $id;
    private $saves = Array();

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
}

    public function addTrait(RacialTrait $trait) {
        $this->traits[] = $trait;
    }

    public function addSave($statid, $value) {
        $this->saves[$statid] = $value;
    }

    /**
     * @return array
     */
    public function getTraits()
    {
        return $this->traits;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getSaves()
    {
        return $this->saves;
    }




}