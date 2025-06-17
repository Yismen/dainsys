<?php

namespace App\Repositories;

class ConfigRepository
{
    public function get(string $key, $default = null): array
    {
        $distro = config($key, $default);

        return preg_split("/[,\|]+/", (string) $distro, -1, PREG_SPLIT_NO_EMPTY);
    }
}
