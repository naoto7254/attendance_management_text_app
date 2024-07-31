<?php

require_once('RegisterAttendance.php');

$register_info = [];

// ここは後で入力値にする必要がある>別日のシフトを登録する場合があるから
$timezone = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('now', $timezone);
$formatted_date = $date->format('Y-m-d');
$register_info['date'] = $formatted_date;

// PartRankについて入力
echo 'PartRankを1から7の整数で入力してください' . PHP_EOL;
echo 'PartRank: ';
$register_info['part_rank'] = (int)trim(fgets(STDIN));

// shiftTypeについての入力
echo "shiftTypeを['morning', 'afternoon', 'night']から入力してください";
echo 'shiftType: ';
$register_info['shift_type'] = trim(fgets(STDIN));

$rank = new PartRank($register_info['part_rank']);
$register = new RegisterAttendance($register_info['date'], $register_info['shift_type']);

$result = $register->registerSalary($rank);
var_export($result);
