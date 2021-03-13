<?php

namespace Tests\Unit;

use App\Repositories\Concrete\TemplateRepository;
use App\Repositories\Contracts\TemplateRepositoryContract;
use App\Services\RenderTemplateService;
use PHPUnit\Framework\TestCase;

class TemplatingTest extends TestCase
{
    protected RenderTemplateService $renderTemplateService;

    protected TemplateRepository $templateRepository;

    public function setUp(): void
    {
        parent::setUp();

        app()->bind(TemplateRepositoryContract::class, TemplateRepository::class);
        $this->renderTemplateService = app()->make(RenderTemplateService::class);
        $this->templateRepository = app()->make(TemplateRepository::class);
    }

    public function testTemplateRowContext()
    {
        $context = 'row';

        $result = $this->renderTemplateService->handle($context);
dump($result);
        $expected = "<html>
<head>
    To: admin@admin.ru
</head>
<body>
<p>
    Отчет за сегодня. В системе зарегистрировались:
            Alex Norton,
            Marry Shawn,
            Dan Hoff.
        Их возраст соответственно:
            67,
            18,
            34.
        А вот их адреса:
            alex@mail.com,
            mary@gmail.com,
            dan@ya.ru.
    </p>
</body>
</html>";

        $this->assertEquals($expected, $result);
    }
}
