<?php

require_once('Database.php');

Database::init();
$link = Database::dbConnect();

// データベースへデータを送信
$salary_info = [
    'part_timer_id' => 1,
    'part_timer_name' => 'John',
    'part_timer_email' => 'john.doe@example.com',
    'part_timer_level' => 3,
    'shift_type' => 'night',
    'date_worked' => '2024-08-04',
    'generated_salary' => 2400,
];

$insert_sql = <<<EOT
INSERT INTO salary_records(
    part_timer_id,
    part_timer_name,
    part_timer_email,
    part_timer_level,
    shift_type,
    date_worked,
    generated_salary
) VALUES (
    "{$salary_info['part_timer_id']}",
    "{$salary_info['part_timer_name']}",
    "{$salary_info['part_timer_email']}",
    "{$salary_info['part_timer_level']}",
    "{$salary_info['shift_type']}",
    "{$salary_info['date_worked']}",
    "{$salary_info['generated_salary']}"
)
EOT;

// <ToDo> バリデーションをする
// うまくthrowされていない。この辺の仕組みについてちゃんと調べて実装し直す
try {
    $result = mysqli_query($link, $insert_sql);

    if (!$result) {
        throw new mysqli_sql_exception('Query failed: ' . mysqli_error($link));
    }

    echo 'Query executed successfully.' . PHP_EOL;
} catch (mysqli_sql_exception $e) {
    echo 'Query execution failed: ' . $e->getMessage() . PHP_EOL;
} finally {
    Database::dbClose();
}
