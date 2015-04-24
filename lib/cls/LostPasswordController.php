<?php

class LostPasswordController {
    /**
     * Constructor
     * @param Site $site The site object
     */
    public function __construct(Site $site) {
        $this->site = $site;
    }

    /**
     * Validate a user
     * @param $validator The validator string
     * @return null or an error message
     */
    public function validate($validator) {
        $users = new Users($this->site);
        $lp = new LostPasswords($this->site);

        $user = $lp->removeLostPassword($validator);
        if($user === null) {
            return "Invalid validator";
        }

        $users->updatePassword($user);
        return null;
    }

    private $site;
}