<?php

namespace App\Http\Requests;

use App\Models\Kriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlternatifRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $kriteria = Kriteria::all();
        $rules = [
            'kode' => ['required', Rule::unique('alternatif')->ignore($this->id)],
            'nama' => 'required',
            'keterangan' => 'required',
        ];

        foreach ($kriteria as $k) {
            $rules[$k->kode] = 'required';
        }

        return $rules;
    }
}
