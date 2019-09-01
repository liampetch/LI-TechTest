<?php

namespace App\Model;


final class MaxProvider
{
    private $currentMax;

    public function __construct($max = 0)
    {
        $this->currentMax = $max;
    }

    public function challengeMax($potentialMax)
    {
        if ($potentialMax > $this->currentMax) {
            $this->currentMax = $potentialMax;
        }
    }

    public function getMax()
    {
        return $this->currentMax;
    }
}
