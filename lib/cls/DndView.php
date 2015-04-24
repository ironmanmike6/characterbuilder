<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/8/2015
 * Time: 1:42 PM
 */

class DndView {
    private $dnd;    // The Wumpus object
    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Dnd $dnd) {
        $this->dnd = $dnd;
    }

}