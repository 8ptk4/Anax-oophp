<?PHP
namespace Patrik\Dice;

//require "DiceHand.php";
//include(__DIR__ . "/DiceHand.php");

//use Dice\DiceHand;

/**
 * Each player needs...
 * A hand of dices.
 */
class Players
{
    public $name;
    public $dices;
    public $dicehand;
    public $rolls = [];
    public $sum = [];
    public $currentThrow;
    public $totalPoints;

    /**
     * Set name and age of person.
     *
     * @method __construct
     * @param  string      $name  Name of player.
     */
    public function __construct(string $name = "Player", int $dices = 6)
    {
        $this->name = $name;
        $this->dices = $dices;
        $this->dicehand = new DiceHand($dices);
        //$this->rolls = $this->dicehand->values();
    }

    /**
     * Return string with person information.
     *
     * @method details
     * @return string  Person information.
     */
    public function details()
    {
        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }
    /*
    public function throw()
    {
        foreach ($dicehand->dices as $dices) {
            array_push($this->rolls, $dices->roll());
        }
    }
    */
    public function setTotalPoints($sum)
    {
        $this->totalPoints += $sum;
    }

    public function getTotalPoints()
    {
        return $this->totalPoints;
    }
}
