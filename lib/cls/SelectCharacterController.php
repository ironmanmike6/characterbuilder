<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/5/2015
 * Time: 1:06 AM
 */

class SelectCharacterController {

    private $site;
    private $user;
    private $charNum;

    public function __construct($post, $site, $user) {
        $this->site = $site;
        $this->charNum = $post['selectchar'];
        $this->user = $user;

}

    public function setCurrentCharacter() {
        $characters = new Characters($this->site);
        $char = $characters->getCharacterForId($this->charNum);


        $this->user->setCurrentCharacter($char);
    }

}