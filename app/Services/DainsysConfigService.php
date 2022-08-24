<?php

namespace App\Services;

class DainsysConfigService
{
    public function get(string $key, $default = null)
    {
        return config($key, $default);
    }

    public function getDistro(string $key)
    {
        $distro = $this->get($key);

        $distro ?: abort(403, 'Unable to find a distro list for config ' . $key . '. Did you set it up in your .env file?');

        return explode('|', $distro);
    }
}
