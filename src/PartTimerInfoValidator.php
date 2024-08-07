<?php

require_once('PartTimer.php');

class PartTimerInfoValidator
{
    private const MIN_LEVEL = 1;
    private const MAX_LEVEL = 7;

    public function __construct(private PartTimer $partTimer)
    {
    }

    public function validateLevel(): bool
    {
        $level = $this->partTimer->getLevel();

        if (!is_int($level)) {
            echo 'レベルは整数で指定してください' . PHP_EOL;
            echo "入力された値: {$level}" . PHP_EOL;
            return false;
        }

        if ($level < self::MIN_LEVEL || $level > self::MAX_LEVEL) {
            echo 'レベルは1〜7の整数で指定してください' . PHP_EOL;
            echo "入力された値: {$level}" . PHP_EOL;
            return false;
        }
        return true;
    }
}
