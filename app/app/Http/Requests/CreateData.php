<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'title' => 'required',
            'pet' => 'required',
            'date' => 'required|date',
            'category_id' => 'required',
            'image' => 'required',
            'episode' => 'required|max:300',
        ];
    }
}
