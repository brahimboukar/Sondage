<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecomponseRequest extends FormRequest
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
            'libelle'  => 'required|string',
            'id_categorie'  => 'required',
            'points'  => 'required',
            'status'  => 'required',
            'img'  => 'required',
        ];
    }
}
