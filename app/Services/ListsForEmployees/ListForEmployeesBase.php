<?php

namespace App\Services\ListsForEmployees;


use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

abstract class ListForEmployeesBase
{
    abstract public static function model(): string;

    protected static function cacheKey(): string
    {
        return str(static::class)->afterLast('\\')->snake();
    }

    public static function make(): Collection
    {
        return Cache::rememberForever(static::cacheKey(), function () {
            return static::model()::query()
                ->orderBy('name')
                ->whereHas('employees')
                ->get(['id', 'name']);
        });
    }
}
