<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 4/1/2015
 * Time: 7:22 PM
 */

class StatisticsController {

    private $post;
    private $char;

    public function __construct($post, Character $character) {
        $this->post = $post;
        $this->char = $character;
    }

    public function updateStats() {
        foreach($this->post as $key => $value) {
            $split = explode('-', $key, 2);


            if(count($split) > 1) {
                $split[1] = str_replace('_', ' ' , $split[1]);
                //echo "0.".$split[0]."<br>";
               //echo "1.".$split[1]."<br>";
                //echo "2.".$value."<br>";
                $this->char->setProficiency($split[0],$split[1],$value);
            } else {
                // Stat
                $this->char->setStats($key, $value);
            }

        }
    }
}