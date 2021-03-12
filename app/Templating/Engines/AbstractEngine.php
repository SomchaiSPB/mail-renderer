<?php


namespace App\Templating\Engines;


use App\Models\Template;
use App\Templating\Contracts\TemplateEngineInterface;

abstract class AbstractEngine implements TemplateEngineInterface
{
    protected Template $template;

    public function setTemplate(Template $template): TemplateEngineInterface
    {
        $this->template = $template;

        return $this;
    }
}
