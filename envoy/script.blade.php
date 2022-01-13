@servers(['production' => 'yjorge@192.168.10.24'])

@setup
    date_default_timezone_set('America/Santo_Domingo');
    $date = date('YmdHis');

    $repo = 'https://github.com/Yismen/dainsys.git';
    $rootDir = '/var/www';
    $appDir = $rootDir . '/dainsys';
    // $serverDir = $rootDir . '/current';
    $serverDir = $appDir . '/current';
    $releasesDir = $appDir . '/sources';
    $deploymentDir = $releasesDir . '/' . $date;
    $branch = 'master';

    $env = $appDir . '/.env';
    $storage = $appDir . '/storage';
@endsetup

@story('deploy')
    {{-- update_app --}}
    git
    install
    switch_deployment
    remove_old_releases

    {{-- Hooks --}}
    @finished
        if ($exitCode > 0) {
            echo "Failed";
        } else {
            echo "Deployment Successfull";
        }
    @endfinished
@endstory

@task('update_app', ['on' => 'production'])
    cd  {{ $appDir }}

    git pull   
@endtask

@task('git', ['on' => 'production'])
    echo "Clonning Repo"

    git clone -b {{ $branch }} "{{ $repo }}" {{ $deploymentDir }}
@endtask

@task('install', ['on' => 'production'])
    echo "Installing dependencies"

    cd {{ $deploymentDir }}
    
    rm -rf {{ $deploymentDir }}/storage
    
    ln -nfs {{ $env }} {{ $deploymentDir }}/.env
    
    ln -nfs {{ $storage }} {{ $deploymentDir }}/storage
    
    composer install --prefer-dist --no-dev
    
    php ./artisan migrate --force

    php ./artisan optimize
@endtask

@task('switch_deployment', ['on' => 'production'])
    echo "Switching server to new release"

    cd {{ $rootDir }}
    
    echo {{ $appDir }} {{ $serverDir }} {{ $date }}

    ln -nfs {{ $deploymentDir }} {{ $serverDir }}
@endtask

@task('remove_old_releases', ['on' => 'production'])
    echo "Cleaning old releases"

    cd {{ $releasesDir }}

    shopt -s extglob

    rm -rf !({{ $date }})
@endtask