<?php


namespace App\Factories\Contracts;


use App\Services\Contracts\RenderTemplateCommonInterface;

interface TemplateContextFactoryInterface
{
    public function createRenderTemplate(int $context): RenderTemplateCommonInterface;
}
