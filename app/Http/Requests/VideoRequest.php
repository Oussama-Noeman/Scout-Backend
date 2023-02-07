<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'playlist_id'=>[
                'required'
            ],
            'title'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string'
            ],
            'caption'=>[
                'required',
                'string'
            ],
            'image'=>[
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'related_tags'=>[
                'required',
                'string'
            ],
            'status'=>[
                'nullable'
            ],
            'view_status'=>[
                'nullable'
            ]
        ];
        return $rules;
    }
}
