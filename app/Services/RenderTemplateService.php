<?php


namespace App\Services;


use App\Models\Template;
use App\Models\User;
use App\Repositories\Contracts\TemplateRepositoryContract;
use App\Templating\Templating;

class RenderTemplateService
{
    private Templating $templating;

    private TemplateRepositoryContract $templateRepository;

    private int $context;

    const CONTEXT_ROW = 1;

    const CONTEXT_TABLE = 2;

    /**
     * RenderTemplateService constructor.
     * @param Templating $templating
     * @param TemplateRepositoryContract $templateRepository
     */
    public function __construct(Templating $templating, TemplateRepositoryContract $templateRepository)
    {
        $this->templating = $templating;
        $this->templateRepository = $templateRepository;
    }

    public function handle(string $context): string
    {
        switch ($context):
            case 'table':
                self::setContext($this::CONTEXT_TABLE);
                break;
            case 'row':
                self::setContext($this::CONTEXT_ROW);
                break;
            default:
                throw new \Exception('context is undefined');
        endswitch;

        return $this->render();
    }

    private function setContext(int $context): void
    {
        $this->context = $context;
    }

    private function getTemplate(): Template
    {
        return $this->templateRepository->find($this->context);
    }

    private function getUsers(): array
    {
        return (new User())->getUsers();
    }

    private function getAdminUser(): array
    {
        return (new User())->getAdminUser();
    }

    private function render(): string
    {
        $template = $this->getTemplate();
        $template->setTemplateType();

        $users = $this->getUsers();

        $result = '';

        if ($this->context === self::CONTEXT_ROW) {
            foreach ($users as $user) {
                $result .= $this->templating->compile($template, ['email' => $user['email'], 'name' => $user['name']]);
                $result .= PHP_EOL;
            }
        } elseif ($this->context === self::CONTEXT_TABLE) {
            $result = $this->templating->compile($template, ['users' => $users, 'to' => ['email' => $this->getAdminUser()['email']]]);
        }

        return $result;
    }
}
