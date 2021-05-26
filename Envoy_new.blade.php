@servers(['local' => ['127.0.0.1'], 'web' => ['root@192.168.10.24'], 'web2' => ['yjorge@192.168.10.24']])

@setup
    $root = '/var/www/html/';
    $releaseFolder = $root .'releases/';
    $serverLink = $root . 'current';
    $branch = 'master';
    $date = date('Y_m_d_H_i_s');
    $newRelease = $releaseFolder . $date;
@endsetup

@task('deploy', ['on' => 'web2'])
    {{-- Create release folder and access it --}}
    [ -d {{ $releaseFolder }} ] || mkdir {{ $releaseFolder }}
    [ -d {{ $newRelease }} ] || mkdir {{ $newRelease }}
    cd {{ $newRelease }}
    {{-- Clone git repo --}}
    git clone https://github.com/Yismen/dainsys.git .
    git checkout {{ $branch }}
    {{-- Run installation routine --}}
    cp -r {{ $serverLink . "/.env" }} {{ $newRelease }}
    composer install --no-dev -o -n
    chown -R :www-data {{ $newRelease }}
    chmod -R 775 {{ $newRelease.'/storage' }}
    chmod -R 775 {{ $newRelease.'/bootstrap/cache' }}
    php artisan migrate --force
    php artisan dainsys:laravel-logs laravel- --clear --keep=8
    php artisan cache:clear
    php artisan optimize
    php artisan storage:link
    cd {{ $newRelease }} && npm install && npm run production
    {{-- Point the link to the new folder --}}
    ln -sfn {{ $newRelease }} {{ $serverLink }}
    rm -Rd {{ $releaseFolder }}!'({{ $date }})'
@endtask