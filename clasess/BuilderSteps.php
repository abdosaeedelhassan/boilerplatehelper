<?php


namespace App\Console\Commands\boilerplatehelper\clasess;

class BuilderSteps
{
    private $app_name = 'boilerplatehelper';

    private $templates_dir_path;

    private $route_auth_file_path;


    public function __construct()
    {
        $this->templates_dir_path = app_path('Console/Commands/' . $this->app_name . '/templates');
        $this->routes_auth_file_path = base_path('routes/backend/auth.php');
    }


    public function getRoutes($route_name)
    {
        $fileHelper = new FileHelper($this->routes_auth_file_path);
        $route_auth_file_content = $fileHelper->getContent();
        /**
         * add use statements to routes auth file
         */
        $str = 'use App\\Domains\\Auth\\Http\\Controllers\\Backend\\'.ucfirst($route_name).'\\'.ucfirst($route_name).'Controller;'."\n";
        $str .= 'use App\\Domains\\Auth\\Models\\'.ucfirst($route_name).';'."\n";
        $str .= '//use_statement';
        $route_auth_file_content = str_replace('//use_statement', $str, $route_auth_file_content);
        /**
         * add new routes to routes auth file
         */
        $fileHelper = new FileHelper($this->templates_dir_path . '/route');
        $str = str_replace('RoleController', ucfirst($route_name) . 'Controller', $fileHelper->getContent());
        $str = str_replace('role', strtolower($route_name), $str);
        $str = str_replace('Role', ucfirst($route_name), $str);
        $str.="\n//route_statements";
        $route_auth_file_content = str_replace('//route_statements', $str, $route_auth_file_content);



        return $route_auth_file_content;
    }
}
