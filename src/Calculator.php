<?php

require_once('PartTimer.php');
require_once('PartSalary.php');

class Calculator
{
    public static function calcSalary(PartTimer $partTimer, string $shiftType): int
    {
        $level = $partTimer->getLevel() - 1;

        switch ($shiftType) {
            case 'morning':
                return PartSalary::getMorningSalaries()[$level];
            case 'afternoon':
                return PartSalary::getAfternoonSalaries()[$level];
            case 'night':
                return PartSalary::getNightSalaries()[$level];
        }
    }
}
