<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string'
            ],
            'image'=>[
                'nullable',
                'mimes:jpeg,png,jpg'
            ]
        ];
        return $rules;
    }
}
