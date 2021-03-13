<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetContextRequest;
use App\Services\RenderTemplateService;
use Illuminate\Http\JsonResponse;

class RenderController extends Controller
{
    private RenderTemplateService $renderTemplateService;

    public function __construct(RenderTemplateService $renderTemplateService)
    {
        $this->renderTemplateService = $renderTemplateService;
    }


    public function __invoke(GetContextRequest $request)
    {
        $response = $this->renderTemplateService->handle($request->context);

        return response($response);
    }
}
