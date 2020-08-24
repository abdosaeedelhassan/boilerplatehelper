<?php

namespace App\Console\Commands\BoilerplateHelper;

use App\Console\Commands\boilerplatehelper\clasess\BuilderSteps;
use Illuminate\Console\Command;

class CrudBuilder extends Command
{
    private $app_name = 'boilerplatehelper';
    private $to_do_list_file_path;
    private $models_dir_path;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asaycrudbuilder:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'laravel biolerplate crud builder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->to_do_list_file_path = app_path('Console/Commands/' . $this->app_name . DIRECTORY_SEPARATOR.'ToDoList.php');
        $this->models_dir_path = app_path('Domains/Auth/Models');

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $builder = new BuilderSteps();

        $this->info('Welcome in asaycrudbuilder for laravel boilerplate');

        $to_do_list_content = include  $this->to_do_list_file_path;

        foreach ($to_do_list_content as $item) {
            // check if model not exists
            if (! file_exists($this->models_dir_path.DIRECTORY_SEPARATOR.ucfirst($item['basics']['tablename']).'.php')) {


                //$this->info($builder->createMigrationFile($item));
                //$this->info($builder->createModelFile($item));
                $this->info($builder->addNewRoutesToauthFile($item['basics']['tablename']));
            }
        }

        return 0;
    }
}
