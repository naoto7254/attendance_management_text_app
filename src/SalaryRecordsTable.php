<?php

require_once('Database.php');

class SalaryRecordsTable
{
    public static function insert(mysqli $link, array $salaryInfo): void
    {
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
    "{$salaryInfo['part_timer_id']}",
    "{$salaryInfo['part_timer_name']}",
    "{$salaryInfo['part_timer_email']}",
    "{$salaryInfo['part_timer_level']}",
    "{$salaryInfo['shift_type']}",
    "{$salaryInfo['date_worked']}",
    "{$salaryInfo['generated_salary']}"
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
        }
    }
}
