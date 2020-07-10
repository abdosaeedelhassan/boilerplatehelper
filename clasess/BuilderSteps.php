<?php


namespace App\Console\Commands\boilerplatehelper\clasess;

class BuilderSteps
{
    private $app_name = 'boilerplatehelper';


    private $templates_dir_path;

    private $models_dir_path;
    private $routes_auth_file_path;


    public function __construct()
    {
        $this->templates_dir_path = app_path('Console/Commands/' . $this->app_name . '/templates');
        $this->models_dir_path = app_path('Domains/Auth/Models');
        $this->routes_auth_file_path = base_path('routes/backend/auth.php');
    }




    private function createDir($dirpath, $mode = 0777)
    {
        return is_dir($dirpath) || mkdir($dirpath, $mode, true);
    }

    private function createFile($filename, $template)
    {
        file_put_contents($filename, $template);
    }

    public function addNewRoutesToauthFile($model_name)
    {
        $routes_auth_file_fileHelper = new FileHelper($this->routes_auth_file_path);
        $route_auth_file_content = $routes_auth_file_fileHelper->getContent();
        /**
         * add use statements to routes auth file
         */
        $str = 'use App\\Domains\\Auth\\Http\\Controllers\\Backend\\'.ucfirst($model_name).'\\'.ucfirst($model_name).'Controller;'."\n";
        $str .= 'use App\\Domains\\Auth\\Models\\'.ucfirst($model_name).';'."\n";
        $str .= '//use_statement';
        $route_auth_file_content = str_replace('//use_statement', $str, $route_auth_file_content);
        /**
         * add new routes to routes auth file
         */
        $fileHelper = new FileHelper($this->templates_dir_path . '/route');
        $str = str_replace('RoleController', ucfirst($model_name) . 'Controller', $fileHelper->getContent());
        $str = str_replace('role', strtolower($model_name), $str);
        $str = str_replace('Role', ucfirst($model_name), $str);
        $str .= "\n//route_statements";
        $route_auth_file_content = str_replace('//route_statements', $str, $route_auth_file_content);
        /**
         * replace route auth file with new content
         */
        $routes_auth_file_fileHelper->setContent($route_auth_file_content);

        return 'done';
    }

    public function createModelFile($model_component) : string
    {
        $model_name = ucfirst($model_component['basics']['tablename']);
        $fields = '';
        $ctr = 0;
        foreach ($model_component['fields'] as $filed) {
            if ($ctr > 0) {
                $fields .= ',';
            }
            $ctr++;
            $fields .= "'".$filed[0]."'";
        }
        $fileHelper = new FileHelper($this->templates_dir_path . '/ModelClass.php');
        $str = str_replace('//fileds', $fields, $fileHelper->getContent());
        $str = str_replace('ModelClass', $model_name, $str);

        $use_attribute = 'use App\\Domains\\Auth\\Models\\Traits\\Attribute\\'.$model_name.'Attribute;'."\n//use_statement_path";
        $str = str_replace('//use_statement_path',$use_attribute , $str);
        $use_method = 'use App\\Domains\\Auth\\Models\\Traits\\Method\\'.$model_name.'Method;'."\n";
        $str = str_replace('//use_statement_path',$use_method , $str);
        $use_name='use '.$model_name.'Method,'.$model_name.'Attribute;'."\n";
        $str = str_replace('//use_statement_name',$use_name , $str);


        /**
         * create model file
         */
        $this->createFile($this->models_dir_path.DIRECTORY_SEPARATOR.ucfirst($model_name).'.php', $str);

        //$this->createDir($this->models_dir_path.DIRECTORY_SEPARATOR.ucfirst($model_name));

        return 'Model '.$model_name.' created...';
    }
}