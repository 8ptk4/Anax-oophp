<?PHP
namespace Patrik\Dice;

/**
 * Game controll class.
 */
class Game
{

    public $players = [];
    public $game = [];
    public $state = 0;
    public $playerturn = 0;
    public $temp = 0;

    public function __construct(string $name = "Player", int $dices = 6, int $opponents = 1)
    {
        // Alla spelare object i players!
        // DEM HAR EN DICE HAND!
        $this->players[0] = new Players($name, $dices);

        for ($i = 1; $i < ($opponents + 1); $i++) {
            $this->players[$i] = new Players("Opponent" . ($i), $dices);
        }
    }



    public function getState()
    {
        return $this->state;
    }



    public function setState($state)
    {
        $this->state = $state;
    }


    public function setPlayerturn($player)
    {
        $this->playerturn = $player;
    }


    public function getPlayerturn()
    {
        return $this->playerturn;
    }

    public function test($player)
    {
        $this->players[$player]->setTotalPoints($this->temp);
        $this->temp = 0;
    }


    // Check who starts
    public function whoStarts()
    {
        foreach ($this->players as $player) {
            $player->dicehand->dices[0]->roll();
        }

        if ($this->playerRoll(0, 0) == $this->playerRoll(1, 0)) {
            $this->setState(0);
            return "Both players rolled same dice! Throw again...";
            //$this->whoStarts();
        } else if ($this->playerRoll(0, 0) > $this->playerRoll(1, 0)) {
            //array_push($this->game, $this->players[0], $this->players[1]);
            $this->setPlayerturn(0);
            $this->setState(1);
            return "{$this->players[0]->getName()} rolled highest! And will begin.";
        } else if ($this->playerRoll(0, 0) < $this->playerRoll(1, 0)) {
            //array_push($this->game, $this->players[1], $this->players[0]);
            $this->setPlayerturn(1);
            $this->setState(1);
            return "{$this->players[1]->getName()} rolled highest! And will begin.";
        }
    }



    public function play($player)
    {
        //$this->players[$player]->dicehand->roll();
        echo "<h3>" . $this->players[$player]->getName() . "</h3>";

        //echo $player->dicehand->values[0];
        echo "<p>" . implode(", ", $this->players[$player]->dicehand->values()) . "</p>";

        if (in_array(1, $this->players[$player]->dicehand->values())) {
            $this->temp = 0;
            echo "<p>You rolled 1, and lost all points</p>";
            echo "<p>Turn goes over to the next player</p>";
            if ($this->getPlayerturn() == 0) {
                $this->setPlayerturn(1);
            } else if ($this->getPlayerturn() == 1) {
                $this->setPlayerturn(0);
            }
        } else {
            $this->temp += $this->players[$player]->dicehand->sum();
        }
        //echo "<p> Sum this turn:" . $player->dicehand->sum() . "</p>";

        //echo "<p>Totalsum: " . "</p>";

        echo "<pre>";
        print_r($player);
        echo "</pre>";

    }


    public function playerRoll($argOne, $argTwo)
    {
        return $this->players[$argOne]->dicehand->dices[$argTwo]->getLastRoll();
    }
}
