<?php


namespace App\Console\Commands\boilerplatehelper\clasess;

class FileHelper
{
    private $filename;


    /**
     * FileHelper constructor.
     * @param $filename
     */
    public function __construct($path)
    {
        $this->filename=$path;
    }



    /**
     * @return bool|false|string
     */
    public function getContent()
    {
        if (! $this->filename || ! is_readable($this->filename) || is_dir($this->filename)) {
            return false;
        }

        return file_get_contents($this->filename);
    }
}
