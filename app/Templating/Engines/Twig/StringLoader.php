<?php


namespace App\Templating\Engines\Twig;

use App\Models\Template;
use Twig\Loader\LoaderInterface;
use Twig\Source;

class StringLoader implements LoaderInterface
{
    /**
     * @var Template
     */
    private $template;

    /**
     * @inheritDoc
     */
    public function getSourceContext(string $name): Source
    {
        return new Source($this->template->getContent(), $name);
    }

    /**
     * @inheritDoc
     */
    public function getCacheKey(string $name): string
    {
        return $name;
    }

    /**
     * @inheritDoc
     */
    public function isFresh(string $name, int $time): bool
    {
        return $time >= $this->template->updated_at;
    }

    /**
     * @inheritDoc
     */
    public function exists(string $name)
    {
        return $this->template !== null && $this->template->uuid = $name;
    }

    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }
}
