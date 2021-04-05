<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'=>['bail','required','str','max:80','min:1'],
            'age'=>['bail','required','str','max:50','min:1'],
            'reason_see'=>['bail','required','str','max:200','min:1'],
            'assign'=>['bail','required','str','max:2000','min:1'],
        ];
    }
}
