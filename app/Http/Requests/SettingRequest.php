<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'jumlah_pendaftar'=>'required|numeric',
            'biaya'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
          'jumlah_pendaftar.required'=>'Jumlah Pendaftar Wajib Diisi',
          'jumlah_pendaftar.numeric'=>'Jumlah Pendaftar Harus Angka',
          'biaya.required'=>'Biaya Wajib Diisi',
          'biaya.numeric'=>'Biaya Harus Angka',
        ];
    }
}
