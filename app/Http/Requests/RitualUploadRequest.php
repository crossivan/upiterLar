<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RitualUploadRequest extends FormRequest
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
        return [
            'photo'         => 'nullable|image|exclude_if:withoutPhoto,true',
            'hash_name'     => 'nullable|string',
            'colored'       => 'required|boolean',
            'shape'         => 'required|boolean',
            'frame'         => 'required|integer|numeric',
            'orientation'   => 'required|boolean',
            'background'    => 'required|integer|numeric',
            'holes'         => 'required|boolean',
            'sizes'         => 'required|integer|numeric|between:0,5',
            'cross'         => 'required|boolean',
            'withText'      => 'required|boolean',
            'withoutPhoto'  => 'required|boolean',
            'epitaph'       => 'nullable|string',
            'last_name'     => 'nullable|string|exclude_if:withText,false',
            'first_name'    => 'nullable|string|exclude_if:withText,false',
            'patronymic'    => 'nullable|string|exclude_if:withText,false',
            'birthday'      => 'nullable|date|before:death',
            'death'         => 'nullable|date|before:today|after:birthday',
        ];
    }
}
