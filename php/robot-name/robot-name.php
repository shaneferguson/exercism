<?php

class Robot
{
    protected $name = null;

    /**
     * Get this robots name
     *
     * @return string
     */
    public function getName()
    {
        if (is_null($this->name)) {
            $this->assignName();
        }

        return $this->name;
    }

    /**
     * Reset the robots name
     */
    public function reset()
    {
        $this->name = null;
    }

    /**
     * Assigns a name in the format of AA000
     * letter + letter + digit + digit + digit
     */
    private function assignName()
    {
        $this->name = $this->randLetters() . $this->randNumbers();
    }

    /**
     * Get a random 2 letter combination
     *
     * @return string
     */
    private function randLetters()
    {
        return chr(rand(65, 90)) . chr(rand(65, 90));
    }

    /**
     * Get a random 3 digit sequence
     *
     * @return string
     */
    private function randNumbers()
    {
        return str_pad(rand(0, 999), 3, '0');
    }
}