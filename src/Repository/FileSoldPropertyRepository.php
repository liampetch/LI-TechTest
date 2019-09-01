<?php

namespace App\Repository;

use App\Model\MaxProvider;
use App\Model\SoldProperty;

class FileSoldPropertyRepository implements SoldPropertyRepository
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getAll()
    {
        $collection = [];
        $maxProvider = new MaxProvider();

        if ($fileHandle = fopen($this->filePath, 'r')) {
            while (!feof($fileHandle)) {
                $soldPropertyLine = fgets($fileHandle);
                if ($soldPropertyLine && $this->validate($soldPropertyLine)) {
                    $collection[] = $this->build($soldPropertyLine, $maxProvider);
                }
            }
            fclose($fileHandle);
        }

        return $collection;
    }

    private function validate(string $soldPropertyLine)
    {
        $soldPropertyArray = explode(" ", trim($soldPropertyLine));

        if (!is_numeric($soldPropertyArray[0])) {
            return false;
        }

        if (!is_numeric($soldPropertyArray[1])) {
            return false;
        }

        if (empty($soldPropertyArray[2])) {
            return false;
        }

        return true;
    }

    private function build($soldPropertyLine, $maxProvider)
    {
        $soldPropertyArray = explode(" ", trim($soldPropertyLine));
        return new SoldProperty(
            $soldPropertyArray[0],
            $soldPropertyArray[1],
            $soldPropertyArray[2],
            $maxProvider
        );
    }
}
