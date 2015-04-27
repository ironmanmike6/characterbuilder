<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/1/2015
 * Time: 5:55 AM
 */

class CharacterView {

    private $character;
    private $site;

    public function __construct(Character $char,Site $site) {
        $this->character = $char;
        $this->site = $site;
    }

    public function presentStats() {
        $html = <<<HTML
<div class="cube">
<div class="options">
<div class="form">
<h2>Statistics</h2>
<div id="infoform">
<form  id="statisticsForm">
HTML;

        $stats = get_object_vars($this->character); // This gets all public variables of the object, which happen to be the 6 stats (how convenient...)

        foreach($stats as  $stat) {
            $name = $stat->getName();
            $nameProper = ucwords($name);
            $val = $stat->getValue();
            $mod = $stat->getMod();
            $html .= <<<THING
<div class="labelstat"><div class="before"><label for="$name">$nameProper : </label><input class="statinput" type="number" name="$name" id="$name" value=$val onclick="clickStat(event)"></div><div class ="after"><label class="box"> $mod </label></div>
<li>
THING;
            $saves = get_object_vars($stat);
            foreach($saves as $save) {
                $nameSpaceless  = str_replace(' ', '_' ,$save->getName());
                $saveName = $name ."-". $nameSpaceless;
                $saveNameProper = ucwords($save->getName());
                $saveMod = $save->getValue();
                $saveProficiency = $save->getProficient();
                $checked = "";
                if($saveProficiency) {
                    $checked = "checked";
                }
                $html .= <<<THING
<ul>
<div class="before" id="$saveName"><input type="hidden" value='0' name=$saveName><input type="checkbox" class="saveCheckbox" name="$saveName" value="1" $checked  title="proficient?" onclick="clickSave(event)"> $saveNameProper</div><div class ="after"><label class="blank"> $saveMod </label></div>
</ul>
THING;
            }
            $html .= <<<THING
</li>
</div>
THING;



        }



        $html .= <<<HTML
<p>&nbsp;</p>
<p><input type="submit"></p>
</form>
</div>
</div>
</div>
</div>
HTML;
     return $html;
    }
   public function presentInfo() {




       $html = "";
       $name = $this->character->getName();

       $html .= <<<HTML
<div class="cube">
<div class="options">
<div class="form">
<h2>Character Information</h2>
<div id="infoform">
<form>
<div class ="info">
<div><label for="charname">Character Name&nbsp;:&nbsp;</label><input type="text" name="charname" id="charname" value="$name"></div>
<div><label for="playername">Player Name&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="playername" id="playername"></div>
<div><label for="class">Class: </label><a href="#">5 Paladin</a> <a href="#">6 Druid</a></div>
<div>
<select name="classadd">
<option value="nothing">Add class</option>
<option value="barbarian">Barbarian</option>
<option value="bard">Bard</option>
</select>
<select name="leveladd">
<option value="lev">Level</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
<input type="submit">
</div>
<div>
<select name="classremove">
<option value="remove">Remove class</option>
<option value="1">5 Paladin</option>
<option value="2">6 Druid</option>
</select>
<input type="submit">
</div>
</form>

HTML;



       if(!is_null($this->character->getRace())) {
           $html .= "<div id=\"raceName\"> Race : ";
           $raceVar = $this->character->getRace();
           $html .= $raceVar->getName();
           $html .= "</div>";

       }


       $html .= <<<HTML
<button id="racebutton">Set Race</button>
<form id="raceform" method="post" action="post/race-post.php" hidden>
<div>
<select name="race">
<option value="addrace">Race</option>
HTML;



       $races = new Races($this->site);
       $raceArray = $races->getAllRaces();

foreach($raceArray as $race) {
    $raceId = $race->getId();
    $raceName = $race->getName();
    $html .= "<option value=\"$raceId\">$raceName</option>";
}




$html .= <<<HTML
</select>
<select name="subrace">
<option value="addsubrace">Subrace</option>
</select>
<input type="submit">
</div>

</div>
</form>
</div>
</div>
</div>
</div>
HTML;



       return $html;
   }

}