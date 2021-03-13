<?php


namespace App\Repositories\Contracts;


use App\Models\Template;
use Illuminate\Support\Collection;

interface TemplateRepositoryContract
{
    public function find(int $id): Template;

    public function getTemplates(): Collection;
}
