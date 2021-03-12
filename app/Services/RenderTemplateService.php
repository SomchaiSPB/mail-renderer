<?php


namespace App\Services;


use App\Models\Template;
use App\Templating\Templating;

class RenderTemplateService
{
    private Templating $templating;

    private array $data;

    /**
     * RenderTemplateService constructor.
     * @param Templating $templating
     * @param array $data
     */
    public function __construct(Templating $templating, array $data)
    {
        $this->templating = $templating;
        $this->data = $data;
    }

    public function render(Template $template): string
    {
        return $this->templating->compile($template, ['users' => $this->data, 'to' => ['email' => 'admin@admin.ru']]);
    }
}
