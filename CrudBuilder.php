<?php

namespace App\Console\Commands\BoilerplateHelper;

use App\Console\Commands\boilerplatehelper\clasess\BuilderSteps;
use Illuminate\Console\Command;

class CrudBuilder extends Command
{
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

        $this->info($builder->getRoutes('providers'));

        return 0;
    }
}
