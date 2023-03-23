<?php

namespace App\Providers;

use Spatie\Dropbox\Client ;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Illuminate\Filesystem\FilesystemAdapter;

class DropboxFilesystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('dropbox', function ($app, $config) {
            $client = new Client($config['accessToken']);

            $adapter = new DropboxAdapter($client);
            $driver = new Filesystem($adapter, ['case_sensitive' => false]);

            return new FilesystemAdapter($driver, $adapter);
        });
    }

    public function register()
    {
    }
}
