<?php

namespace App\Repositories;

use App\Models\Employee;

class MissingInfoRepository
{
    protected static $instance;

    public static function address()
    {
        self::$instance ??= new self;

        return self::$instance->query('address');
    }

    public static function afp()
    {
        self::$instance ??= new self;

        return self::$instance->query('afp');
    }

    public static function ars()
    {
        self::$instance ??= new self;

        return self::$instance->query('ars');
    }

    public static function photo()
    {
        return Employee::actives()
            ->filter(request()->all())
            ->sorted()
            ->forDefaultSites()
            ->missingPhoto();
    }

    public static function punch()
    {
        self::$instance ??= new self;

        return self::$instance->query('punch');
    }

    public static function bankAccount()
    {
        self::$instance ??= new self;

        return self::$instance->query('bankAccount');
    }

    public static function supervisor()
    {
        self::$instance ??= new self;

        return self::$instance->query('supervisor');
    }

    public static function nationality()
    {
        self::$instance ??= new self;

        return self::$instance->query('nationality');
    }

    public static function schedules()
    {
        self::$instance ??= new self;

        return self::$instance->query('schedules');
    }

    protected function query($related_field)
    {
        return Employee::actives()
            ->filter(request()->all())
            ->sorted()
            ->forDefaultSites()
            ->with($related_field)
            ->whereDoesntHave($related_field);
    }
}
