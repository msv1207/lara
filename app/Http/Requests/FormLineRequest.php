<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'x2' => 'required|integer|min:0',
            'y2' => 'required|integer|min:0',
            'color' => 'required|integer|min:0',
        ];
    }
}