@servers(['local' => ['127.0.0.1'], 'web' => ['root@192.168.10.24'], 'web2' => ['yjorge@192.168.10.24']])

@setup
    $root = '/var/www/html/';
    $releaseFolder = $root .'release';
    $projectFolder = $root . 'dainsys';
    $serverLink = $root . 'current';
    $branch = 'master';
@endsetup
@story('deploy')
    update-locally
    copy-project-to-release-folder
@endstory

@task('update-locally', ['on' => 'local'])
    git push
@endtask

@task('copy-project-to-release-folder', ['on' => 'web'])  
    ln -sfn {{ $projectFolder }} {{ $serverLink }}

    [ -d {{ $releaseFolder }} ] || mkdir {{ $releaseFolder }}
    cd {{ $releaseFolder }}
    {{-- cp -rvfp {{ $projectFolder . "/*" }} {{ $releaseFolder }} --}}
    cp -rvfp {{ $projectFolder }}/[^node_modules][^vendor]* {{ $releaseFolder }}
    cp -rvfp {{ $projectFolder . "/.env" }} {{ $releaseFolder }}
    chown -R :www-data {{ $releaseFolder }}
    chmod -R 775 {{ $releaseFolder.'/storage' }}
    chmod -R 775 {{ $releaseFolder.'/bootstrap/cache' }}
    
    composer install --no-dev -o -n
    php artisan migrate --force
    npm install && npm run production
    php artisan dainsys:laravel-logs laravel- --clear --keep=8
    php artisan cache:clear
    php artisan optimize
    
    ln -sfn {{ $releaseFolder }} {{ $serverLink }}
@endtask

@task('deploy-to-production-folder', ['on' => 'web'])
    {{-- [ -d {{ $projectFolder }} ] || mkdir {{ $projectFolder }} --}}
    cd {{ $projectFolder }}
    git reset --hard
    git pull origin {{ $branch }} --force
    git checkout {{ $branch }}

    composer install --no-dev -o -n
    php artisan migrate --force
    npm install && npm run production
    php artisan dainsys:laravel-logs laravel- --clear --keep=8
    php artisan cache:clear
    php artisan optimize

    ln -sfn {{ $projectFolder }} {{ $serverLink }}
@endtask

{{-- @after
    composer install --no-dev -o -n
    php artisan migrate --force
    npm install && npm run production
    php artisan dainsys:laravel-logs laravel- --clear --keep=8
    php artisan cache:clear
    php artisan optimize
@endafter --}}