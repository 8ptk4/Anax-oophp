<?php
namespace Patrik\Dice;

/**
 * Throw a dice.
 */
class Dice
{

    public $sides;
    /**
     * @var int $lastRoll Get a grapic value of the last rolled dice.
     */
    //private $lastRoll;
    protected $lastRoll;

    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
    }


    /**
     * [roll description]
     * @method roll
     * @return [type] [description]
     */
    public function roll()
    {
        $this->lastRoll = rand(1, 6);

        return $this->lastRoll;
    }


    public function getLastRoll()
    {
        return $this->lastRoll;
    }
}
