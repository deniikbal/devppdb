<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestStudent extends FormRequest
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
            'name'=>'required|unique:students',
            'jenis_kelamin'=>'required',
            'asal_sekolah'=>'required',
            'kecamatan_pd'=>'required',
            'nohp_siswa'=>'required|min:10'
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'Nama Lengkap Wajib Diisi',
          'nohp_siswa.required'=>'Nomor Hp Siswa Wajib Diisi',
          'asal_sekolah.required'=>'Asal Sekolah Wajib Diisi',
          'kecamatan_pd.required'=>'Kecamatan Domisili Wajib Diisi',
          'jenis_kelamin.required'=>'Jenis Kelamin Wajib Di Pilih',
          'name.unique'=>'Nama '.$this->name.' Sudah Terdaftar',
        ];

    }
}
