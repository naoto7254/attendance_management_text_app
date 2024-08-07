<?php

class ShiftTypeValidator
{
    private const VALID_SHIFT_TYPES = ['morning', 'afternoon', 'night'];

    public static function ShiftValidate(string $shiftType): bool
    {
        if (!in_array($shiftType, self::VALID_SHIFT_TYPES)) {
            echo 'シフトタイプは「morning」「afternoon」「night」のいずれかから選択してください' . PHP_EOL;
            echo "選択されたシフトタイプ: {$shiftType}" . PHP_EOL;
            return false;
        }
        return true;
    }
}
