<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
    private static string $dbHost;
    private static string $dbUsername;
    private static string $dbPassword;
    private static string $dbDatabase;
    private static ?mysqli $link = null;

    public static function init(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();;

        self::$dbHost = $_ENV['DB_HOST'];
        self::$dbUsername = $_ENV['DB_USERNAME'];
        self::$dbPassword = $_ENV['DB_PASSWORD'];
        self::$dbDatabase = $_ENV['DB_DATABASE'];
    }

    public static function dbConnect(): void
    {
        try {
            self::$link = mysqli_connect(self::$dbHost, self::$dbUsername, self::$dbPassword, self::$dbDatabase);

            if (!self::$link) {
                throw new mysqli_sql_exception('Could not connect to database.');
            }

            echo 'Connected successfully.' . PHP_EOL;
        } catch (mysqli_sql_exception $e) {
            echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;
        }
    }

    public static function dbClose(): void
    {
        if (self::$link) {
            mysqli_close(self::$link);
            self::$link = null;
            echo 'Connection closed successfully.' . PHP_EOL;
        } else {
            echo 'No connection to close.' . PHP_EOL;
        }
    }
}
