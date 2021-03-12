<?php

namespace App\Templating\Contracts;

use App\Models\Template;

interface TemplateEngineInterface
{
    public function setTemplate(Template $template): self;
    public function compile(array $params = []): string;
}
