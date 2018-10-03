<?php
namespace Patrik\GameRound;

/**
 * Gameround
 *
 */
class GameRound extends Game
{
    public $round;
    public $turn;

    /**
     * Round.
     *
     * @var int $round    Value of last turn.
     */
    public function __construct()
    {
        $this->round = 0;
        $this->turn = 0;
    }

    public function whoStart($players) {
        if ($this->round == 0) {

        }
    }

    public function whosTurn($player) {
        return $player[$turn];
    }

    public function allPlayers($player) {
        return $player;
    }

    public function playRound()
    {
        if ($this->round == 0) {

        }
    }

    public function setRounds($players)
    {
        $this->rounds = count($players);
    }

    public function getRounds($players)
    {
        return $this->rounds;
    }

}
