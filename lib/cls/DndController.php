<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/8/2015
 * Time: 2:26 PM
 */

class DndController {
    private $dnd;                // The Wumpus object we are controlling
    private $page = 'builder.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game

    /**
     * Constructor
     */
    public function __construct(Dnd $dnd, $request) {
        $this->dnd = $dnd;

        /**
        if(isset($request['m'])) {
            $this->move($request['m']);
        } else if(isset($request['s'])) {
            $this->shoot($request['s']);
        } else if(isset($request['n'])) {
            // New game!
            $this->reset = true;
        } else if(isset($request['c'])) {
            // Cheat mode
            $this->cheat =  true;
        }
         * */
    }

    public function getPage() {
        return $this->page;
    }

    public function isReset() {
        return $this->reset;
    }


/**
    private function move($ndx) {
        // Simple error check
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }

        switch($this->wumpus->move($ndx)) {
            case Wumpus::HAPPY:
                break;

            case Wumpus::EATEN:
            case Wumpus::FELL:
                $this->reset = true;
                $this->page = 'lose.php';
                break;
        }
    }


    private function shoot($ndx) {
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }
        if($this->wumpus->shoot($ndx)) {
            $this->reset = true;
            $this->page = 'win.php';
        } else if($this->wumpus->numArrows() === 0) {
            $this->reset = true;
            $this->page = 'lose.php';
        }
    }
    **/
}



?>