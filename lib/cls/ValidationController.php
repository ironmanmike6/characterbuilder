<?php


class ValidationController {
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
        $lp = new NewUsers($this->site);

        $user = $lp->removeNewUser($validator);
        if($user === null) {
            return "Invalid validator";
        }

        $users->add($user);
        return null;
    }

    private $site;
}