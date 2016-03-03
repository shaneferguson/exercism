<?php

class Game
{

    protected $rolls;

    /**
     * Adds a throw to the game
     *
     * @param $pins
     */
    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * Calculates the game score
     *
     * @return int|mixed
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frames = 1; $frames <= 10; $frames++) {

            if ($this->isStrike($roll)) {
                $score += $this->calcStrikeScore($roll);
                $roll += 1;
            } elseif ($this->isSpare($roll)) {
                $score += $this->calcSpareScore($roll);
                $roll += 2;
            } else {
                $score += $this->calcFrameScore($roll);
                $roll += 2;
            }

        }

        return $score;
    }

    /**
     * Checks if the roll was a strike
     *
     * @param $roll
     *
     * @return bool
     */
    private function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    /**
     * Checks if the frame was a spare
     *
     * @param $roll
     *
     * @return bool
     */
    private function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

    /**
     * Calculates the frame score for a spare
     *
     * @param $roll
     *
     * @return int
     */
    private function calcSpareScore($roll)
    {
        return 10 + $this->rolls[$roll + 2];
    }

    /**
     * Calculates the frame score for a strike
     *
     * @param $roll
     *
     * @return int
     */
    private function calcStrikeScore($roll)
    {
        return 10 + $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * Calculates the score for a regular frame
     *
     * @param $roll
     *
     * @return mixed
     */
    private function calcFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }
}