<?php

require_once('PartTimer.php');

class PartSalary
{
    private array $morningSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];
    private array $afternoonSalaries = [1000, 1000, 1000, 1000, 1000, 1000, 1000];
    private array $nightSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];

    public function getMorningSalaries(): array
    {
        return $this->morningSalaries;
    }

    public function getAfternoonSalaries(): array
    {
        return $this->afternoonSalaries;
    }

    public function getNightSalaries(): array
    {
        return $this->nightSalaries;
    }
}
