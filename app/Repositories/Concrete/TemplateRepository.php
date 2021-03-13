<?php


namespace App\Repositories\Concrete;


use App\Models\Template;
use App\Repositories\Contracts\TemplateRepositoryContract;
use Illuminate\Support\Collection;

class TemplateRepository implements TemplateRepositoryContract
{

    protected Template $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
    }


    public function find(int $id): Template
    {
        try {
            return $this->template->findOrFail($id);
        } catch (\Exception $e) {
            \Log::error('template_not_found_error', ['message' => $e->getMessage()]);
        }
    }

    public function getTemplates(): Collection
    {
        return $this->getTemplates();
    }

}
