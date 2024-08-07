<?php

require_once('PartTimer.php');
require_once('PartSalary.php');
require_once('Calculator.php');
require_once('Database.php');
require_once('SalaryRecordsTable.php');
require_once('PartTimerInfoValidator.php');

$salary_info = [];

// ここは後で入力値にする必要がある>別日のシフトを登録する場合があるから
$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);
$formatted_date = $date->format('Y-m-d');
$salary_info['date_worked'] = $formatted_date;

// shiftTypeについての入力
echo "shiftTypeを['morning', 'afternoon', 'night']から入力してください" . PHP_EOL;
echo 'shiftType: ';
$salary_info['shift_type'] = trim(fgets(STDIN));

// PartTimerクラスのインスタンス化
$part_timer = new PartTimer(1, 'John', 'john.doe@example.com', 4);

$salary_info['part_timer_id'] = $part_timer->getId();
$salary_info['part_timer_name'] = $part_timer->getName();
$salary_info['part_timer_email'] = $part_timer->getEmail();
$salary_info['part_timer_level'] = $part_timer->getLevel();

// PartTimerクラスのバリデーションs
$part_timer_validator = new PartTimerInfoValidator($part_timer);

$error_detection = [];
$error_detection[] = $part_timer_validator->validateLevel();

if (in_array(false, $error_detection)) {
    exit;
}


// 給料の計算
$calc_result = Calculator::calcSalary($part_timer, $salary_info['shift_type']);

$salary_info['generated_salary'] = $calc_result;



Database::init();
$link = Database::dbConnect();

SalaryRecordsTable::insert($link, $salary_info);

Database::dbClose();
