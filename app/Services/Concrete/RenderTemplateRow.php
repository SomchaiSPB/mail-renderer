<?php


namespace App\Services\Concrete;


use App\Models\Template;
use App\Services\Contracts\RenderTemplateCommonInterface;

class RenderTemplateRow extends RenderTemplateBase implements RenderTemplateCommonInterface
{
    public function render(Template $template): string
    {
        $result = array_map(function ($user) use ($template) {
            return $this->templating->compile($template, ['email' => $user['email'], 'name' => $user['name']]);
        }, $this->getUsers());

        $result = implode(PHP_EOL, $result);

        return $result;
    }
}
