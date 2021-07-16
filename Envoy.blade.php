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
    {{-- ensure-folder-exists --}}
    copy-project-to-release-folder
    deploy-to-production-folder
@endstory

@task('update-locally', ['on' => 'local'])
    git push
@endtask
@task('ensure-folder-exists')    
    [ -d {{ $projectFolder }} ] || mkdir {{ $projectFolder }}
@endtask
@task('copy-project-to-release-folder', ['on' => 'web'])  
    ln -sfn {{ $projectFolder }} {{ $serverLink }}

    [ -d {{ $releaseFolder }} ] || mkdir {{ $releaseFolder }}
    cd {{ $releaseFolder }}
    rsync -avr --exclude=/node_modules --exclude=/vendor --exclude=/.git {{ $projectFolder.'/' }} {{ $releaseFolder }}
    
    composer install --no-dev -o -n
    chown -R :www-data {{ $releaseFolder }}
    chmod -R 775 {{ $releaseFolder.'/storage' }}
    chmod -R 775 {{ $releaseFolder.'/bootstrap/cache' }}

    php artisan dainsys:laravel-logs laravel- --clear --keep=8
    php artisan cache:clear
    php artisan optimize
    
    ln -sfn {{ $releaseFolder }} {{ $serverLink }}
@endtask

@task('deploy-to-production-folder', ['on' => 'web'])
    cd {{ $projectFolder }}
    git reset --hard
    git pull origin {{ $branch }} --force
    git checkout {{ $branch }}

    chown -R :www-data {{ $projectFolder }}
    chmod -R 775 {{ $projectFolder.'/storage' }}
    chmod -R 775 {{ $projectFolder.'/bootstrap/cache' }}

    composer install --no-dev -o -n
    php artisan migrate --force
    
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