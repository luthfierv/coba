<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRelawanRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16', 'unique:relawans,nik'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string', 'max:25'],
            'email' => ['required', 'email', 'max:255', 'unique:relawans,email'],
            'lokasi_domisili' => ['required', 'string', 'max:255'],
            'area_tugas' => ['required', 'string', 'max:255'],
            'dokumen' => ['required', 'array', 'min:1', 'max:5'],
            'dokumen.*' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:5120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'no_hp' => 'nomor HP',
            'lokasi_domisili' => 'lokasi domisili',
            'area_tugas' => 'area tugas',
            'dokumen' => 'dokumen pendukung',
            'dokumen.*' => 'dokumen pendukung',
        ];
    }
}
