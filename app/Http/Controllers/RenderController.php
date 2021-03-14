<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetContextRequest;
use App\Services\RenderTemplateService;
use Illuminate\Http\Response;

class RenderController extends Controller
{
    private RenderTemplateService $renderTemplateService;

    public function __construct(RenderTemplateService $renderTemplateService)
    {
        $this->renderTemplateService = $renderTemplateService;
    }


    public function __invoke(GetContextRequest $request): Response
    {
        try {
            $response = $this->renderTemplateService->handle($request->context);
        } catch (\Exception $e) {
            \Log::error('template_service_error', ['message' => $e->getMessage()]);
        }

        return response($response);
    }
}
