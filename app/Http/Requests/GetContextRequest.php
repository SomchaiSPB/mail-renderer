<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetContextRequest extends FormRequest
{
    public function rules()
    {
        return [
            "context" => "string|in:table,row|required"
        ];
    }

    public function authorize()
    {
        return true;
    }
}
