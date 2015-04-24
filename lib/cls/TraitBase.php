<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/20/2015
 * Time: 7:54 PM
 */

/**
 * Class TraitBase Contains a name + description + id number
 */
class TraitBase {
    private $name;
    private $description;
    private $id;

    public function __construct($name, $description, $id) {

        $this->name = $name;
        $this->description = $description;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}