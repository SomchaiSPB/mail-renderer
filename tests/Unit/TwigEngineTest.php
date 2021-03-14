<?php

namespace Tests\Unit;

use App\Templating\Contracts\TemplateEngineInterface;
use App\Templating\Engines\TwigEngine;
use PHPUnit\Framework\TestCase;

class TwigEngineTest extends TestCase
{
    public function testAssertTwigEngineInstanceOfTemplateEngineInterface()
    {
        $twigEngine = new TwigEngine();

        $this->assertInstanceOf(TemplateEngineInterface::class, $twigEngine);
    }
}
