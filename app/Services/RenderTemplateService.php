<?php


namespace App\Services;


use App\Enums\ContextEnum;
use App\Models\Template;
use App\Repositories\Contracts\TemplateRepositoryContract;
use App\Services\Concrete\RenderTemplateRow;
use App\Services\Concrete\RenderTemplateTable;
use App\Services\Contracts\RenderTemplateCommonInterface;
use App\Templating\Templating;

class RenderTemplateService
{
    private TemplateRepositoryContract $templateRepository;

    private RenderTemplateCommonInterface $renderTemplate;

    private int $context;

    /**
     * RenderTemplateService constructor.
     * @param TemplateRepositoryContract $templateRepository
     */
    public function __construct(TemplateRepositoryContract $templateRepository)
    {
        $this->templateRepository = $templateRepository;
    }

    public function handle(string $context): string
    {
        switch ($context):
            case 'table':
                self::setContext(ContextEnum::CONTEXT_TABLE);
                $this->renderTemplate = new RenderTemplateTable(new Templating());
                break;
            case 'row':
                self::setContext(ContextEnum::CONTEXT_ROW);
                $this->renderTemplate = new RenderTemplateRow(new Templating());
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


    private function render(): string
    {
        $template = $this->getTemplate();
        $template->setTemplateType();

        return $this->renderTemplate->render($template);
    }
}
