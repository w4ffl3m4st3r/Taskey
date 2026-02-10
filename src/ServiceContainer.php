<?php

namespace Framework;

use Exception;

class ServiceContainer
{
    /** @var array<class-string, object> */
    private array $instances = [];

    /**
     * @param string $id
     * @param object $instance
     * @return void
     * @throws Exception
     */
    public function set(string $id, object $instance): void
    {
        if (isset($this->instances[$id])) {
            throw new Exception("Target binding '{$id}' does not exist.'");
        }
        $this->instances[$id] = $instance;
    }

    /**
     * @throws Exception
     */
    public function get(string $id): object
    {
        if (!isset($this->instances[$id])) {
            throw new Exception("Service '{$id}' does not exist.");
        }
        return $this->instances[$id];
    }
}
