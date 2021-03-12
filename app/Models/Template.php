<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected string $content;

    protected int $templateType;


    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setTemplateType(int $templateType): void
    {
        $this->templateType = $templateType;
    }

    public function getTemplateType(): int
    {
        return $this->templateType;
    }
}
