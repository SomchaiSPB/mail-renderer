<?php


namespace App\Factories\Concrete;


use App\Factories\Contracts\TemplateContextFactoryInterface;
use App\Services\Concrete\RenderTemplateRow;
use App\Services\Concrete\RenderTemplateTable;
use App\Services\Contracts\RenderTemplateCommonInterface;
use App\Templating\Templating;

class TemplateContextFactory implements TemplateContextFactoryInterface
{

    public function createRenderTemplate(int $context): RenderTemplateCommonInterface
    {
        switch ($context):
            case 1:
                return new RenderTemplateRow(new Templating());
            case 2:
                return new RenderTemplateTable(new Templating());
            default:
                throw new \Exception('Wrong template context');
        endswitch;
    }
}
