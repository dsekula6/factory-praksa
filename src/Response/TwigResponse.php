<?php

namespace Daniel\Factory\Response;

use Daniel\Factory\Interface\ResponseInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigResponse implements ResponseInterface
{
    
    private string $template;
    private array $data;

    public function __construct(string $template, array $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function send()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new Environment($loader, []);

        return $twig->render($this->template, $this->data);
    }
}