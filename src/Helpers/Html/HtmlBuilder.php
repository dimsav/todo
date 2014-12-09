<?php namespace Dimsav\Todo\Helpers\Html;

class HtmlBuilder extends \Illuminate\Html\HtmlBuilder {

    public function style($url, $attributes = [], $secure = null)
    {
        $url = $this->appendHashToFile($url);
        return parent::style($url, $attributes = [], $secure = null);
    }

    public function script($url, $attributes = [], $secure = null)
    {
        $url = $this->appendHashToFile($url);
        return parent::script($url, $attributes = [], $secure = null);
    }

    protected function appendHashToFile($file)
    {
        if (is_file($file) && $time = filemtime($file))
        {
            $md5 = \Cache::rememberForever("file_md5_{$file}_{$time}", function() use ($file) {
                return md5_file($file);
            });

            $file .= "?v=$md5";
        }
        return $file;
    }

}