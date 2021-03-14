<?php


namespace App\Services\Contracts;


use App\Models\Template;

interface RenderTemplateCommonInterface
{
    public function render(Template $template): string;
}
