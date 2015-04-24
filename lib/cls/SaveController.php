<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/3/2015
 * Time: 5:17 AM
 */

class SaveController {

    private $char;
    private $site;
    private $user;

    public function __construct(User $user, Site $site) {
        $this->char = $user->getCurrentCharacter();
        $this->user = $user;
        $this->site = $site;
    }

    public function saveCharacter() {
        $characters = new Characters($this->site);

        $characters->saveCharacter($this->char, $this->user);
    }
}