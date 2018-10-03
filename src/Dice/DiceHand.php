<?php
namespace Patrik\Dice;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand
{

    /**
     * @var array $dices    Array consisting of dices.
     */
    public $dices;

    /**
     * @var int $values     Array consisting of last roll of the dices.
     */
    public $values;



    /**
     * [__construct description]
     * @method __construct
     * @param  int     $dices [description]
     */
    public function __construct(int $dices = 5)
    {
        $this->dices    = [];
        $this->values   = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[] = new Dice();
            $this->values[] = null;
        }
    }


    /**
     * Roll all dices and save their value.
     *
     * @method roll
     * @return void
     */
    public function roll()
    {
        for ($i = 0; $i < count($this->dices); $i++) {
            $value = $this->dices[$i]->roll();

            $this->values[$i] = $value;
        }
    }


    /**
     * Get values of dices from last roll.
     *
     * @method values
     * @return array Values of last roll.
     */
    public function values()
    {
        return $this->values;
    }


    /**
     * Get the sum of all dices.
     *
     * @method sum
     * @return int Sum of all dices.
     */
    public function sum()
    {
        return array_sum($this->values);
    }


    /**
     * Get the average value of all dices.
     *
     * @method average
     * @return float  Average value of all dices.
     */
    public function average()
    {
        return round(array_sum($this->values) / count($this->values), 1);
    }
}
