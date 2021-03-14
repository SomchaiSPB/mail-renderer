<?php

namespace Tests\Unit;

use App\Models\Template;
use App\Models\User;
use App\Templating\Templating;
use PHPUnit\Framework\TestCase;

class TemplatingRowContextTest extends TestCase
{
    protected string $baseDir;

    protected Templating $templating;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseDir =  dirname(__DIR__) . "../../";
        $this->templating = app()->make(Templating::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->templating = app()->make(Templating::class);
    }


    public function testTemplateRowContextUserNameExists()
    {
        $result = null;

        $template = new Template();
        $users = (new User())->getUsers();

        $content = file_get_contents($this->baseDir . "app/Templates/template_1.twig");

        $template->setTemplateType();
        $template->setContent($content);

        foreach($users as $user) {
            $result .= $this->templating->compile($template, ['email' => $user['email'], 'name' => $user['name']]);
            $result .= PHP_EOL;
        }

        $this->assertStringContainsString('Привет, Alex Norton', $result);
        $this->assertStringContainsString('Привет, Marry Shawn', $result);
        $this->assertStringContainsString('Привет, Dan Hoff', $result);
    }

    public function testTemplateRowContextUserEmailExists()
    {
        $result = null;

        $template = new Template();
        $users = (new User())->getUsers();

        $content = file_get_contents($this->baseDir . "app/Templates/template_1.twig");

        $template->setTemplateType();
        $template->setContent($content);

        foreach($users as $user) {
            $result .= $this->templating->compile($template, ['email' => $user['email'], 'name' => $user['name']]);
            $result .= PHP_EOL;
        }

        $this->assertStringContainsString('alex@mail.com', $result);
        $this->assertStringContainsString('mary@gmail.com', $result);
        $this->assertStringContainsString('dan@ya.ru', $result);
    }
}
