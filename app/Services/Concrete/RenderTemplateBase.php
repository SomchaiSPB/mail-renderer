<?php


namespace App\Services\Concrete;


use App\Models\User;
use App\Services\Contracts\RenderTemplateCommonInterface;
use App\Templating\Templating;

abstract class RenderTemplateBase implements RenderTemplateCommonInterface
{
    protected Templating $templating;

    /**
     * RenderTemplateService constructor.
     * @param Templating $templating
     */
    public function __construct(Templating $templating)
    {
        $this->templating = $templating;
    }

    protected function getUsers(): array
    {
        return (new User())->getUsers();
    }

    protected function getAdminUser(): array
    {
        return (new User())->getAdminUser();
    }
}
