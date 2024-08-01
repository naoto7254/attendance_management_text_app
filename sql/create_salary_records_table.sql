DROP TABLE IF EXISTS salary_records;

CREATE TABLE salary_records (
    id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    part_timer_id INTEGER,
    part_timer_name VARCHAR(100),
    part_timer_email VARCHAR(100),
    part_timer_level INTEGER,
    shift_type VARCHAR(20),
    generated_salary INTEGER,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;