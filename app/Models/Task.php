<?php

namespace App\Models;

class Task
{
    public int $id;

    public string $title;

    public string $description;

    public int $priority;

    public int $status;

    public int $progress;

    public int $created_at;

    public ?int $completed_at;

    public function __construct()
    {
        $this->priority = 0;
        $this->status = 0;
        $this->progress = 0;
        $this->created_at = time();
        $this->completed_at = null;
    }
}
