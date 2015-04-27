<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/13/2015
 * Time: 2:43 PM
 */

class CharacterFactory {

    private $site;

    public function __construct(Site $site) {
        $this->site = $site;
    }

    public function create($row = null) {
        if(is_null($row)) {
            return $this->defaultCreate();
        } else {
            return $this->createFromDatabase($row);
        }

    }
    private function defaultCreate() {
        $char = new Character();

        $str= new Strength($char);
        $str->athletics = new Athletics($str);
        $str->savingthrow = new StrengthSavingThrow($str);
        $char->strength = $str;


        $dex = new Dexterity($char);
        $dex->savingthrow = new DexteritySavingThrow($dex);
        $dex->acrobatics = new Acrobatics($dex);
        $dex->sleightofhand = new SleightOfHand($dex);
        $dex->stealth = new Stealth($dex);
        $char->dexterity = $dex;


        $con = new Constitution($char);
        $con->savingthrow = new ConstitutionSavingThrow($con);
        $char->constitution = $con;


        $int = new Intelligence($char);
        $int->savingthrow = new IntelligenceSavingThrow($int);
        $int->arcana = new Arcana($int);
        $int->history = new History($int);
        $int->investigation = new Investigation($int);
        $int->religion = new Religion($int);
        $int->nature = new Nature($int);
        $char->intelligence = $int;


        $wis = new Wisdom($char);
        $wis->savingthrow = new WisdomSavingThrow($wis);
        $wis->animalhandling = new AnimalHandling($wis);
        $wis->insight = new Insight($wis);
        $wis->medicine = new Medicine($wis);
        $wis->perception = new Perception($wis);
        $wis->survival = new Survival($wis);
        $char->wisdom = $wis;


        $cha = new Charisma($char);
        $cha->savingthrow = new CharismaSavingThrow($cha);
        $cha->deception = new Deception($cha);
        $cha->intimidation = new Intimidation($cha);
        $cha->performance = new Performance($cha);
        $cha->persuasion = new Persuasion($cha);
        $char->charisma = $cha;

        //var_dump($char);

        return $char;

        //var_dump(get_object_vars($char));
    }

    private function createFromDatabase($row) {
        $char = new Character();
        $char->setName($row['name']);
        $char->setCharNum($row['id']);

        $info = $row['info'];

        $xml = simplexml_load_string($info);

        $character = $xml->character;
        $raceId = $character->{'race'};

        $races = new Races($this->site);
        $race = $races->getRaceById($raceId);
        $char->setRace($race);


        $stats = $xml->stats;

        // Strength
        $strXml = $stats->strength;
        $strVal = (int)$strXml;
        $strSaves = $strXml->saves;

        $str= new Strength($char, $strVal);
        $save = (int)$strSaves->{'saving-throws'};
        $str->savingthrow = new StrengthSavingThrow($str, $save);
        $save = (int)$strSaves->{'athletics'};
        $str->athletics = new Athletics($str, $save);
        $char->strength = $str;

        //Dexterity
        $dexXml = $stats->dexterity;
        $dexVal = (int)$dexXml;
        $dexSaves = $dexXml->saves;

        $dex = new Dexterity($char, $dexVal);
        $save = (int)$dexSaves->{'saving-throws'};
        $dex->savingthrow = new DexteritySavingThrow($dex, $save);
        $save = (int)$dexSaves->{'acrobatics'};
        $dex->acrobatics = new Acrobatics($dex, $save);
        $save = (int)$dexSaves->{'sleight-of-hand'};
        $dex->sleightofhand = new SleightOfHand($dex, $save);
        $save = (int)$dexSaves->{'stealth'};
        $dex->stealth = new Stealth($dex, $save);
        $char->dexterity = $dex;

        //Constitution
        $conXml = $stats->constitution;
        $conVal = (int)$conXml;
        $conSaves = $conXml->saves;

        $con = new Constitution($char, $conVal);
        $save = (int)$conSaves->{'saving-throws'};
        $con->savingthrow = new ConstitutionSavingThrow($con, $save);
        $char->constitution = $con;

        //Intelligence
        $intXml = $stats->intelligence;
        $intVal = (int)$intXml;
        $intSaves = $intXml->saves;

        $int = new Intelligence($char, $intVal);
        $save = (int)$intSaves->{'saving-throws'};
        $int->savingthrow = new IntelligenceSavingThrow($int, $save);
        $save = (int)$intSaves->{'arcana'};
        $int->arcana = new Arcana($int, $save);
        $save = (int)$intSaves->{'history'};
        $int->history = new History($int, $save);
        $save = (int)$intSaves->{'investigation'};
        $int->investigation = new Investigation($int, $save);
        $save = (int)$intSaves->{'religion'};
        $int->religion = new Religion($int, $save);
        $save = (int)$intSaves->{'nature'};
        $int->nature = new Nature($int, $save);
        $char->intelligence = $int;

        //Wisdom
        $wisXml = $stats->wisdom;
        $wisVal = (int)$wisXml;
        $wisSaves = $wisXml->saves;

        $wis = new Wisdom($char, $wisVal);
        $save = (int)$wisSaves->{'saving-throws'};
        $wis->savingthrow = new WisdomSavingThrow($wis, $save);
        $save = (int)$wisSaves->{'animal-handling'};
        $wis->animalhandling = new AnimalHandling($wis, $save);
        $save = (int)$wisSaves->{'insight'};
        $wis->insight = new Insight($wis, $save);
        $save = (int)$wisSaves->{'medicine'};
        $wis->medicine = new Medicine($wis, $save);
        $save = (int)$wisSaves->{'perception'};
        $wis->perception = new Perception($wis, $save);
        $save = (int)$wisSaves->{'survival'};
        $wis->survival = new Survival($wis, $save);
        $char->wisdom = $wis;

        //Charisma
        $chaXml = $stats->charisma;
        $chaVal = (int)$chaXml;
        $chaSaves = $chaXml->saves;

        $cha = new Charisma($char, $chaVal);
        $save = (int)$chaSaves->{'saving-throws'};
        $cha->savingthrow = new CharismaSavingThrow($cha, $save);
        $save = (int)$chaSaves->{'deception'};
        $cha->deception = new Deception($cha, $save);
        $save = (int)$chaSaves->{'intimidation'};
        $cha->intimidation = new Intimidation($cha, $save);
        $save = (int)$chaSaves->{'performance'};
        $cha->performance = new Performance($cha, $save);
        $save = (int)$chaSaves->{'persuasion'};
        $cha->persuasion = new Persuasion($cha, $save);
        $char->charisma = $cha;

        //var_dump($char);

        return $char;

        //var_dump(get_object_vars($char));
    }

}