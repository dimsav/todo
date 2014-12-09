<?php namespace Dimsav\Todo\Helpers\Html;

use Dimsav\Todo\Helpers\Html\HtmlBuilder;

class HtmlServiceProvider extends \Illuminate\Html\HtmlServiceProvider {

    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function($app)
        {
            return new HtmlBuilder($app['url']);
        });
    }

}