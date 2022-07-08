<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdataRequestScholl extends FormRequest
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
            'nisn'=>'required|size:10',
            'asal_sekolah'=>'required',
            'npsn'=>'required|size:8',
            'provinsi_sekolah'=>'required',
            'kabupaten_sekolah'=>'required',
            'kecamatan_sekolah'=>'required',
            'desa_sekolah'=>'required',
        ];
    }
}
