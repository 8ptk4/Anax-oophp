<?php
namespace Patrik\DiceGraphic;

/**
 * A graphic dice.
 */
class DiceGraphic extends Dice
{
    /**
     * @var integer SIDES Number of sides of the Dice.
     */
    const SIDES = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct()
    {
        parent::__construct(self::SIDES);
    }


    /**
     * Get a graphic value of the last rolled dice.
     *
     * @method graphic
     * @return string  Graphical representation of last rolled dice.
     */
    public function graphic()
    {
        return "dice-" . $this->getLastRoll();
        //return "dice-" - $this->get;
    }
}
