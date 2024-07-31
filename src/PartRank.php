<?php

class PartRank
{

    private int $level;
    private array $morningSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];
    private array $afternoonSalaries = [1000, 1000, 1000, 1000, 1000, 1000, 1000];
    private array $nightSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];

    public function __construct(int $level)
    {
        $this->level = $level;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getMorningSalary($level): int
    {
        return $this->morningSalaries[$level - 1];
    }

    public function getAfternoonSalary($level): int
    {
        return $this->afternoonSalaries[$level - 1];
    }

    public function getNightSalary($level): int
    {
        return $this->nightSalaries[$level - 1];
    }
}
