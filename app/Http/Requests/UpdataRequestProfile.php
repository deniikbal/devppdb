<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdataRequestProfile extends FormRequest
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
            'name'=>'required',
            'jenis_kelamin'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'nik'=>'required|size:16',
            'agama'=>'required',
            'nohp_siswa'=>'required|numeric',
            'anak_ke'=>'required|numeric',
            'jumlah_saudara'=>'required|numeric',
            'tinggi_badan'=>'required|numeric',
            'berat_badan'=>'required|numeric',
            'hoby'=>'required',
            'cita'=>'required',
        ];
    }
}
