<?php

require_once('PartTimer.php');
require_once('PartSalary.php');
require_once('CalcSalary.php');

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

$partTimer = new PartTimer(1, 'John', 'john.doe@example.com', 3);
$partSalary = new PartSalary();
$calcSalary = new CalcSalary($register_info['shift_type']);

$calcResult = $calcSalary->calcSalary($partTimer, $partSalary);
$result = [$register_info['date'], $calcResult];

var_export($result);
