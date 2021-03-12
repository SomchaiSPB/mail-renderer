<?php


namespace App\Templating;


use App\Models\Template;
use App\Models\TemplateType;
use App\Templating\Contracts\TemplateEngineInterface;
use App\Templating\Engines\TwigEngine;
use Exception;

class Templating
{
    const TEMPLATE_ENGINES = [
        TemplateType::TWIG => TwigEngine::class,
    ];

    /**
     * @param Template $template
     * @param array $params
     * @return string
     * @throws Exception
     */
    public function compile(Template $template, array $params = []): string
    {
        $engine = $this->createEngine($template->getTemplateType());

        return $engine->setTemplate($template)->compile($params);
    }

    /**
     * @param int $templateType
     * @return TemplateEngineInterface
     * @throws Exception
     */
    private function createEngine(int $templateType): TemplateEngineInterface
    {
        if (array_key_exists($templateType, self::TEMPLATE_ENGINES)) {
            $engineClass = self::TEMPLATE_ENGINES[$templateType];
            return new $engineClass();
        }
        throw new Exception("Missed template engine for template type = $templateType", 500);
    }
}
