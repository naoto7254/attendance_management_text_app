<?php

require_once('PartTimer.php');

class PartSalary
{
    private static array $morningSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];
    private static array $afternoonSalaries = [1000, 1000, 1000, 1000, 1000, 1000, 1000];
    private static array $nightSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];

    public static function getMorningSalaries(): array
    {
        return self::$morningSalaries;
    }

    public static function getAfternoonSalaries(): array
    {
        return self::$afternoonSalaries;
    }

    public static function getNightSalaries(): array
    {
        return self::$nightSalaries;
    }
}
