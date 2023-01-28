@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <div class="container">
                    <form action="{{route('studentupdate', $student)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Nama Lengkap</label>
                                <input id="name" class="form-control" name="name" value="{{$student->name}}"
                                       type="text">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Jenis Kelamin</label>
                                <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin">
                                    <option value="">--Pilih--</option>
                                    @foreach($jenis_kelamin as $item)
                                        <option
                                                value="{{$item}}" {{$item== old('jenis_kelamin',$student->jenis_kelamin) ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Tempat Lahir</label>
                                <input id="lastname" class="form-control @error('tempat') is-invalid @enderror"
                                       name="tempat"
                                       type="text" value="{{old('tempat',$student->tempat)}}">
                                @error('tempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Tanggal Lahir</label>
                                <input id="lastname" class="form-control @error('tanggal') is-invalid @enderror"
                                       name="tanggal"
                                       type="date" value="{{ old('tanggal',$student->tanggal)}}">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">NIK</label>
                                <input class="form-control @error('nik') is-invalid @enderror" name="nik" type="text"
                                       value="{{ old('nik',$student->nik)}}">
                                @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Agama</label>
                                <select class="form-control select2 @error('agama') is-invalid @enderror" name="agama"
                                        id="">
                                    <option value="">--Pilih--</option>
                                    @foreach($agama as $item)
                                        <option
                                                value="{{$item}}" {{$item== old('agama',$student->agama) ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">No Handphone</label>
                                <input class="form-control @error('nohp_siswa') is-invalid @enderror" name="nohp_siswa"
                                       type="text"
                                       value="{{ $student->nohp_siswa===null ? old('nohp_siswa') : $student->nohp_siswa }}">
                                @error('nohp_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Anak Ke:</label>
                                <input class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"
                                       type="text"
                                       value="{{ $student->anak_ke===null ? old('anak_ke') : $student->anak_ke }}">
                                @error('anak_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Jumlah Saudara</label>
                                <input class="form-control @error('jumlah_saudara') is-invalid @enderror"
                                       name="jumlah_saudara"
                                       type="text"
                                       value="{{ $student->jumlah_saudara===null ? old('jumlah_saudara') : $student->jumlah_saudara }}">
                                @error('jumlah_saudara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Tinggi Badan</label>
                                <input class="form-control @error('tinggi_badan') is-invalid @enderror"
                                       name="tinggi_badan"
                                       type="text"
                                       value="{{ $student->tinggi_badan===null ? old('tinggi_badan') : $student->tinggi_badan }}">
                                @error('tinggi_badan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Berat Badan</label>
                                <input class="form-control @error('berat_badan') is-invalid @enderror"
                                       name="berat_badan"
                                       type="text"
                                       value="{{ $student->berat_badan===null ? old('berat_badan') : $student->berat_badan }}">
                                @error('berat_badan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Hoby</label>
                                <select class="form-control select2 @error('hoby') is-invalid @enderror" name="hoby"
                                        id="">
                                    <option value="">--Pilih--</option>
                                    @foreach($hoby as $item)
                                        <option
                                                value="{{$item}}" {{$item== old('hoby',$student->hoby) ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('hoby')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Cita-cita</label>
                                <select class="form-control select2 @error('cita') is-invalid @enderror" name="cita"
                                        id="">
                                    <option value="">--Pilih--</option>
                                    @foreach($cita as $item)
                                        <option
                                                value="{{$item}}" {{$item== old('cita',$student->cita) ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('cita')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type="submit">
                                <i data-feather="save"></i> Simpan Perubahan
                            </button>
                        </div>


                    </form>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
