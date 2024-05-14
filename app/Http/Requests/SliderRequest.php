<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:120',
            'priority'=>'required|unique:sliders',
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'short_description'=>'nullable|max:200',
            'link'=>'nullable|max:400',
        ];
    }
}