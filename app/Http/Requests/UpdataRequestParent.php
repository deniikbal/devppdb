<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdataRequestParent extends FormRequest
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
           'nokk'=>'required|size:16',
           'namaayah'=>'required',
           'nikayah'=>'required|size:16',
           'tahun_ayah'=>'required|size:4',
           'pendidikan_ayah'=>'required',
           'pekerjaan_ayah'=>'required',
           'penghasilan_ayah'=>'required',
            'nama_ibu'=>'required',
           'nik_ibu'=>'required|size:16',
           'tahun_ibu'=>'required|size:4',
           'pendidikan_ibu'=>'required',
           'pekerjaan_ibu'=>'required',
           'penghasilan_ibu'=>'required',
           'alamat_pd'=>'required',
           'jarak'=>'required',
           'waktu'=>'required',
           'desa_pd'=>'required',
           'kecamatan_pd'=>'required',
           'kota_pd'=>'required',
           'provinsi_pd'=>'required',
        ];
    }
}
