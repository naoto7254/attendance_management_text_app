<?php

require_once('PartTimer.php');
require_once('PartSalary.php');
require_once('Calculator.php');
require_once('Database.php');
require_once('SalaryRecordsTable.php');

$register_info = [];

// ここは後で入力値にする必要がある>別日のシフトを登録する場合があるから
$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);
$formatted_date = $date->format('Y-m-d');
$register_info['date'] = $formatted_date;

// shiftTypeについての入力
echo "shiftTypeを['morning', 'afternoon', 'night']から入力してください";
echo 'shiftType: ';
$register_info['shift_type'] = trim(fgets(STDIN));

$part_timer = new PartTimer(1, 'John', 'john.doe@example.com', 3);

$calc_result = Calculator::calcSalary($part_timer, $register_info['shift_type']);

$salary_info = [
    'part_timer_id' => $part_timer->getId(),
    'part_timer_name' => $part_timer->getName(),
    'part_timer_email' => $part_timer->getEmail(),
    'part_timer_level' => $part_timer->getLevel(),
    'shift_type' => $register_info['shift_type'],
    'date_worked' => $register_info['date'],
    'generated_salary' => $calc_result,
];

Database::init();
$link = Database::dbConnect();

SalaryRecordsTable::insert($link, $salary_info);

Database::dbClose();
