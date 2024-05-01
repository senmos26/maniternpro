<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => ['required', 'regex:/^[a-zA-Z]{2}\d{5}$/'],
            'email' => 'required|email',
            'tel' => ['required', 'regex:/^(0|\+212)([6-7-5])\d{8}$/'],
            'stage_id' => 'required|exists:stages,id',
            'etablissement_id' => 'required|exists:etablissements,id',
            'bureau_id' => 'required|exists:bureaus,id',
            'cv' => 'nullable|file|mimes:pdf',
        ];
    }
}
