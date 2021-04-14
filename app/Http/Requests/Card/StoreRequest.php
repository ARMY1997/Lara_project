<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreRequest extends FormRequest
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
            'name'=>'bail|required|string|max:80|min:2',
            'age'=>'bail|required|max:50|min:5',
            'reason_see'=>'bail|required|string|max:500|min:5',
            'assign'=>'bail|required|string|max:500|min:5'
        ];
    }
}
