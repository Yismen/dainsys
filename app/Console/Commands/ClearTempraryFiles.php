<?php

namespace App\Console\Commands;

use SplFileInfo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ClearTempraryFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:clear-temp-files {remove_files_older_than_days=0 : The amount of days back to delete. 0 for today, 1 for yesterday and so on.} 
        {--test : If passed, a list of deleteable files will be displayed, but files would not be deleted. }
        {--additional_dirs=* : If passed, array of these directories will be added to be removed. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all files from a given set of directories';

    protected Filesystem $filesystem;

    protected array $files = [];

    protected array $directories = [
        'app/livewire-tmp' => '*',
        'app' => '*',
        'debugbar' => '*',
        'app/backup-temp' => '*',
        'framework/laravel-excel' => '*',
        'logs' => 'laravel*',
    ];

    protected array $ignores = [
        '.gitignore',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getFiles();

        $count = count($this->files);

        if ($count === 0) {
            return;
        }

        $this->interactWithFiles();
        $this->warn("{$count} files in total");
    }

    protected function getFiles()
    {
        foreach ($this->option('additional_dirs') as $value) {
            $this->directories[$value] = '*';
        }

        foreach ($this->directories as $directory => $pattern) {
            if ($this->filesystem->exists(storage_path($directory))) {
                foreach ($this->filesystem->files(storage_path($directory)) as $file) {
                    if (
                        $file->isFile()
                         && $this->isInPattern($file->getFilename(), $pattern)
                         && $this->isOldFile($file)
                    ) {
                        $this->files[] = $file;
                    }
                }
            }
        }
    }

    protected function isInPattern(string $file_name, $pattern): bool
    {
        $pattern = Str::replace(['*'], null, $pattern);

        if (strlen($pattern) === 0) {
            return true;
        }

        return Str::startsWith($file_name, $pattern);
    }

    protected function isOldFile(SplFileInfo $file): bool
    {
        $date_updated = Carbon::parse($file->getMTime());

        return $date_updated->diffInDays(now()) >= (int)$this->argument('remove_files_older_than_days');
    }

    protected function interactWithFiles()
    {
        foreach ($this->files as $file) {
            $file_name = $file->getPathname();

            if ($this->option('test')) {
                $this->info($file_name);
            } else {
                $this->filesystem->delete($file);

                $this->warn($file_name);
            }
        }
    }
}
