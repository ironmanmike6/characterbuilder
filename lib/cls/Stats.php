<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/22/2015
 * Time: 8:27 PM
 */

class Stats extends Table {
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "stats");
    }

}