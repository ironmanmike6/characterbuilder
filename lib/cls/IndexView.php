<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/4/2015
 * Time: 8:54 PM
 */

class IndexView {

    private $site;
    private $user;

    public function __construct(Site $site,User $user) {
        $this->site = $site;
        $this->user = $user;
    }

    public function presentCharacters() {

        $id = $this->user->getId();

        $characters = new Characters($this->site);

        $id = $this->user->getId();
        $results = $characters->getCharactersForUser($id);

        if(count($results) < 1) {

            return "";
        }

        $html = <<<HTML
<div class="info">
<select name="selectchar">
HTML;

        foreach($results as $char) {
            $name = $char->getName();
            $num = $char->getCharNum();
            $html .= <<<STUFF
<option value="$num">$name</option>
STUFF;

        }


        $html .= <<<HTML
</select>
<input type="submit" value="Select Character">
</div>
HTML;

     return $html;
    }



}