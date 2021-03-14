<?php


namespace App\Services\Concrete;


use App\Models\Template;
use App\Services\Contracts\RenderTemplateCommonInterface;

class RenderTemplateTable extends RenderTemplateBase implements RenderTemplateCommonInterface
{
    public function render(Template $template): string
    {
        return $this->templating->compile($template, ['users' => $this->getUsers(), 'to' => ['email' => $this->getAdminUser()['email']]]);
    }
}
