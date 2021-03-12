<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Services\RenderTemplateService;
use App\Templating\Templating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RenderController extends Controller
{


    public function __invoke(Request $request)
    {
        $data = require base_path('db_mock.php');

        $renderService = new RenderTemplateService(new Templating(), $data);
        $template = new Template();
        $template->setTemplateType(1);
        $template->setContent(file_get_contents(base_path('app/Templates/template_common.twig')));

        $content = $renderService->render($template);

        return $content;
    }
}
