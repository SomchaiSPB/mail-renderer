<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Template extends Model
{
    protected string $content;

    protected int $templateType;

    public function findOrFail(int $id): self
    {
        $content = file_get_contents(base_path("app/Templates/template_{$id}.twig"));

        if (!is_null($content)) {
            $this->setContent($content);
        } else {
            throw new \Exception('Template not found');
        }

        return $this;
    }

    public function findAll(): Collection
    {
        $templates = new Collection();

        for ($i = 1; $i >= 2; $i++) {
            $template = new self();
            $template->setContent(file_get_contents(base_path("app/Templates/template_{$i}.twig")));

            $templates->push($template);
        }

        return $templates;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setTemplateType(int $templateType = 1): void
    {
        $this->templateType = $templateType;
    }

    public function getTemplateType(): int
    {
        return $this->templateType;
    }
}
