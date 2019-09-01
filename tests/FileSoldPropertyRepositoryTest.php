<?php

namespace App\Tests;


use App\Repository\FileSoldPropertyRepository;
use PHPUnit\Framework\TestCase;

class FileSoldPropertyRepositoryTest extends TestCase
{
    public function testItHandlesEmptyFiles()
    {
        $repository = new FileSoldPropertyRepository('/app/tests/data/empty.txt');
        $count = count($repository->getAll());
        self::assertEquals(0, $count);
    }

    public function testItHandlesFileWithOneEntry()
    {
        $repository = new FileSoldPropertyRepository('/app/tests/data/1.txt');
        $count = count($repository->getAll());
        self::assertEquals(1, $count);
    }

    public function testItHandlesFileWithMultipleEntries()
    {
        $repository = new FileSoldPropertyRepository('/app/tests/data/10.txt');
        $count = count($repository->getAll());
        self::assertEquals(10, $count);
    }

    public function testItSkipsInvalidEntries()
    {
        $repository = new FileSoldPropertyRepository('/app/tests/data/invalid-entries.txt');
        $count = count($repository->getAll());
        self::assertEquals(7, $count);
    }
}
