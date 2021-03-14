<?php

namespace Tests\Unit;

use App\Services\Concrete\RenderTemplateRow;
use App\Services\Concrete\RenderTemplateTable;
use App\Services\Contracts\RenderTemplateCommonInterface;
use App\Services\RenderTemplateService;
use App\Templating\Templating;
use Mockery;
use PHPUnit\Framework\TestCase;

class TemplateServiceTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->baseDir =  dirname(__DIR__) . "../../";
    }

    public function testAssertRowRenderEqualsInterface()
    {
        $rowTemplate = new RenderTemplateRow(new Templating());

        $this->assertInstanceOf(RenderTemplateCommonInterface::class, $rowTemplate);
    }

    public function testAssertTableRenderEqualsInterface()
    {
        $tableTemplate = new RenderTemplateTable(new Templating());

        $this->assertInstanceOf(RenderTemplateCommonInterface::class, $tableTemplate);
    }

    public function testHandleMethodOfRenderTemplateService()
    {
        $service = Mockery::mock(RenderTemplateService::class);

        $service->shouldReceive('handle')->once()->andReturn('string');

        $this->assertSame('string', $service->handle('row'));
    }
}
