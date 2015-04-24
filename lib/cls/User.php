<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/15/2015
 * Time: 9:27 PM
 */

class User {
    private $id;        ///< ID for this user in the user table
    private $userid;    ///< User-supplied ID
    private $name;      ///< What we call you by
    private $email;     ///< Email address
    private $joined;    ///< When we joined the site
    private $role;      ///< The user role

    private $currentCharacter;

    /**
     * Constructor
     * @param $row Row from the user table in the database
     */
    public function __construct($row) {
        $this->id = $row['id'];
        $this->userid = $row['userid'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->joined = strtotime($row['joined']);
        $this->role = $row['role'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getCurrentCharacter()
    {
        return $this->currentCharacter;
    }

    /**
     * @param mixed $currentCharacter
     */
    public function setCurrentCharacter($currentCharacter)
    {
        $this->currentCharacter = $currentCharacter;
    }

}