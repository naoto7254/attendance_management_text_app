<?php

class PartTimer
{
    private int $id;
    private string $name;
    private string $email;
    private int $level;

    public function __construct($id, $name, $email, $level)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->level = $level;
    }

    public function getPartTimerAllInfo()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'level' => $this->level,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
