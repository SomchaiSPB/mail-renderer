<?php


namespace App\Services;


use App\Enums\ContextEnum;
use App\Factories\Contracts\TemplateContextFactoryInterface;
use App\Models\Template;
use App\Repositories\Contracts\TemplateRepositoryContract;
use App\Services\Contracts\RenderTemplateCommonInterface;

class RenderTemplateService
{
    private TemplateRepositoryContract $templateRepository;

    private RenderTemplateCommonInterface $renderTemplate;

    private TemplateContextFactoryInterface $templateFactory;

    private int $context;

    /**
     * RenderTemplateService constructor.
     * @param TemplateRepositoryContract $templateRepository
     * @param TemplateContextFactoryInterface $templateFactory
     */
    public function __construct(TemplateRepositoryContract $templateRepository, TemplateContextFactoryInterface $templateFactory)
    {
        $this->templateRepository = $templateRepository;
        $this->templateFactory = $templateFactory;
    }

    public function handle(string $context): string
    {
        switch ($context):
            case 'table':
                self::setContext(ContextEnum::CONTEXT_TABLE);
                break;
            case 'row':
                self::setContext(ContextEnum::CONTEXT_ROW);
                break;
            default:
                throw new \Exception('context is undefined');
        endswitch;

        $this->renderTemplate = $this->templateFactory->createRenderTemplate($this->context);

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
