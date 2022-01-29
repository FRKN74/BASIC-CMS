<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|min:5',
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'description' => 'required|min:20',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Başlık',
            'name' => 'İsim',
            'image' => 'Resim',
            'description' => 'Açıklama',
        ];
    }
}
