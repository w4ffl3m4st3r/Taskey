<?php

namespace Framework;

use Exception;

class ConfigManager
{
    /** @var mixed */
    public mixed $config;

    private readonly mixed $defaults;

    /**
     * @param mixed $config
     */
    public function __construct(mixed $config)
    {
        $this->defaults = [
            'APP_NAME' => 'TASKEY',
            'DEBUG' => true
        ];
        $this->config = array_merge($config, $this->defaults);
    }

    /**
     * @param string $id
     * @return mixed
     * @throws Exception
     */
    public function get(string $id): mixed
    {
        if (!isset($this->config[$id])) {
            throw new Exception('Trying to get a config value but does not exist');
        }

        return $this->config[$id];
    }
}
