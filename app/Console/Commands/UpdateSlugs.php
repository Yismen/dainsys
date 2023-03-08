<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UpdateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:re-slug {model : The Model to Apply the Slug}
                                            {--field=slug : The Field to run the slug. By default it is slug}
                                            {--force : If set all models will be re-slugged}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the slug field on a given model. This command rely on the implementation and ussage of cviebrock/eloquent-sluggable package ';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = 'App\\Models\\' . $this->argument('model');
        $field = $this->option('field');

        if (! class_exists($model)) {
            return $this->error("Model {$model} Not Found...");
        }

        if (! Schema::hasColumn((new $model())->getTable(), $field)) {
            return $this->error("Field {$field} does not exists in model {$model}");
        }

        $collection = $this->getCollection($model, $field);

        $bar = $this->output->createProgressBar($collection->count());

        $bar->start();

        foreach ($collection as $row) {
            $row->$field = Str::slug($row->$field);

            $row->save();

            $bar->advance();
        }

        $bar->finish();

        return $this->info("Re-slug process completed in model {$model}");
    }

    private function getCollection($model, $field)
    {
        $collection = new $model();

        $collection = $this->option('force') ? $collection : $collection->whereNull($field);

        return $collection->get();
    }
}
