<?php


namespace App\Templating\Engines;

use App\Models\Template;
use App\Templating\Contracts\TemplateEngineInterface;
use App\Templating\Engines\Twig\StringLoader;
use Twig\Environment;

class TwigEngine extends AbstractEngine
{

    private Environment $twig;

    public function __construct()
    {
        $loader = new StringLoader();

        $this->twig = new Environment($loader, [
            'cache' => false,
            'auto_reload' => true
        ]);
    }


    public function compile(array $params = []): string
    {
        return $this->twig->render($this->template->getUuid(), $params);
    }


    public function setTemplate(Template $template): TemplateEngineInterface
    {
        $this->twig->getLoader()->setTemplate($template);

        return parent::setTemplate($template);
    }
}
