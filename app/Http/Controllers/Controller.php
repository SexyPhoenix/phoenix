<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

class Controller {
    
    /**
     * $templete 模板文件
     * $data 数据
     */
    public function render($templete, array $data)
    {
        return new Response(
            (new PhpEngine(
                new TemplateNameParser(), 
                new FilesystemLoader(getcwd().'/resources/views/%name%')
            ))
            ->render($templete, $data)
        );
    }
}
?>