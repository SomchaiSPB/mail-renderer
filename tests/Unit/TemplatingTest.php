<?php

namespace Tests\Unit;

use App\Models\Template;
use App\Models\User;
use App\Templating\Templating;
use PHPUnit\Framework\TestCase;

class TemplatingTest extends TestCase
{
    protected string $baseDir;

    protected Templating $templating;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseDir =  dirname(__DIR__) . "../../";
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

        $this->assertStringContainsString('Alex Norton', $result);
        $this->assertStringContainsString('Marry Shawn', $result);
        $this->assertStringContainsString('Dan Hoff', $result);
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

    public function testTemplateTableContextUserNameExists()
    {
        $result = null;

        $template = new Template();
        $users = (new User())->getUsers();

        $content = file_get_contents($this->baseDir . "app/Templates/template_1.twig");

        $template->setTemplateType();
        $template->setContent($content);

        $result = $this->templating->compile($template, ['users' => $users, 'to' => ['email' => (new User())->getAdminUser()['email']]]);

        $this->assertStringContainsString('Alex Norton', $result);
        $this->assertStringContainsString('Marry Shawn', $result);
        $this->assertStringContainsString('Dan Hoff', $result);
    }

    public function testTemplateTableContextUserEmailExists()
    {
        $result = null;

        $template = new Template();
        $users = (new User())->getUsers();

        $content = file_get_contents($this->baseDir . "app/Templates/template_1.twig");

        $template->setTemplateType();
        $template->setContent($content);

        $result = $this->templating->compile($template, ['users' => $users, 'to' => ['email' => (new User())->getAdminUser()['email']]]);

        $this->assertStringContainsString('alex@mail.com', $result);
        $this->assertStringContainsString('mary@gmail.com', $result);
        $this->assertStringContainsString('dan@ya.ru', $result);
    }
}
