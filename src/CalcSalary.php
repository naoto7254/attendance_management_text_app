<?php

require_once('PartTimer.php');
require_once('PartSalary.php');

class CalcSalary
{
    // shiftTypeは['morning', 'afternoon', 'night']の三つ
    public function __construct(private string $shiftType)
    {
    }

    public function calcSalary(PartTimer $partTimer, PartSalary $salary): int
    {
        $level = $partTimer->getLevel() - 1;

        if ($this->shiftType === 'morning') {
            return $salary->getMorningSalaries()[$level];
        } elseif ($this->shiftType === 'afternoon') {
            return $salary->getAfternoonSalaries()[$level];
        } elseif ($this->shiftType === 'night') {
            return $salary->getNightSalaries()[$level];
        }
    }
}
