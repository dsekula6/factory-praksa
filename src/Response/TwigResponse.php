<?php

namespace Daniel\Factory\Response;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\Form\FormRenderer;
use Twig\RuntimeLoader\FactoryRuntimeLoader;
use Symfony\Component\Translation\Translator;
use Daniel\Factory\Interface\ResponseInterface;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Bridge\Twig\Extension\TranslationExtension;

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
        $formEngine = new TwigRendererEngine(['form_div_layout.html.twig'], $twig);
        
        $twig->addRuntimeLoader(new FactoryRuntimeLoader([
            FormRenderer::class => function () use ($formEngine) {
                return new FormRenderer($formEngine);
            },
        ]));
        $twig->addExtension(new FormExtension());
        
        $translator = new Translator('en', null);
        $twig->addExtension(new TranslationExtension($translator));

        return $twig->render($this->template, $this->data);
    }
}