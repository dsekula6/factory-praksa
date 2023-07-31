<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Interface\ResponseInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigResponse implements ResponseInterface
{
    private $data;
    private $template;

    public function __construct($template, $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function send()
    {
        $twigConfig = require 'config/twig.php';
        $loader = new FilesystemLoader($twigConfig['template_dir']);
        $twig = new Environment($loader, [
            'cache' => $twigConfig['cache'],
            'debug' => $twigConfig['debug'],
        ]);

        $content = $twig->render($this->template, $this->data);
        echo $content;
    }
}