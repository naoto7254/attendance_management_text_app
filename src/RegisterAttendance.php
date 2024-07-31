<?php

require_once('PartRank.php');

class RegisterAttendance
{
    // shiftTypeは['morning', 'afternoon', 'night']の三つ
    public function __construct(private string $date, private string $shiftType)
    {
    }

    public function registerSalary(PartRank $partRank)
    {
        if ($this->shiftType === 'morning') {
            return [$this->date, $partRank->getMorningSalary($partRank->getLevel())];
        } elseif ($this->shiftType === 'afternoon') {
            return [$this->date, $partRank->getAfternoonSalary($partRank->getLevel())];
        } elseif ($this->shiftType === 'night') {
            return [$this->date, $partRank->getNightSalary($partRank->getLevel())];
        }
    }
}
