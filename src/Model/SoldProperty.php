<?php

namespace App\Model;


class SoldProperty
{
    const PRICE_CATEGORY_RANGES = [
      5 => ['min' => 95, 'max' => 100],
      4 => ['min' => 75, 'max' => 95],
      3 => ['min' => 25, 'max' => 75],
      2 => ['min' => 5, 'max' => 25],
      1 => ['min' => 0, 'max' => 5],
    ];

    private $xPos;
    private $yPos;
    private $soldPrice;
    private $maxProvider;

    public function __construct(int $xPos, int $yPos, int $soldPrice, MaxProvider $maxProvider)
    {
        $this->xPos = $xPos;
        $this->yPos = $yPos;
        $this->soldPrice = $soldPrice;
        $this->maxProvider = $maxProvider;
        $this->maxProvider->challengeMax($this->soldPrice);
    }

    /**
     * @return int
     */
    public function getXPos()
    {
        return $this->xPos;
    }

    /**
     * @return int
     */
    public function getYPos()
    {
        return $this->yPos;
    }

    /**
     * @return int
     */
    public function getSoldPrice()
    {
        return $this->soldPrice;
    }

    public function getPriceCategory()
    {
        $percentageOfMax = ($this->soldPrice / $this->maxProvider->getMax()) * 100;
        $category = 0;

        foreach (self::PRICE_CATEGORY_RANGES as $categoryId => $constraints) {
            if ($constraints['min'] < $percentageOfMax && $percentageOfMax <= $constraints['max']) {
                $category = $categoryId;
                break;
            }
        }

        return $category;
    }
}
