<?php

namespace App\Services;

use App\Repositories\DatabaseRepository;

class DainsysConfigService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new DatabaseRepository();
    }

    public function getDistro(string $key)
    {
        $distro = $this->get($key);

        if ($distro === null || count($distro) === 0) {
            throw new \Exception("Unable to find recipients for key {$key}. Did you add them?", 404);
        }

        return $distro;
    }

    protected function get(string $key, $default = null): array
    {
        return $this->repository->get($key, $default);
    }
}
