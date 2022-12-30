@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Setting
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('updatesetting',$setting)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Jumlah Pendaftar</label>
                                    <input type="text" class="form-control @error('jumlah_pendaftar') is-invalid @enderror"
                                           name="jumlah_pendaftar" value="{{ $setting->jumlah_pendaftar }}">
                                    @error('jumlah_pendaftar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Biaya Daftar Ulang</label>
                                    <input type="text" class="form-control @error('biaya') is-invalid @enderror" name="biaya" value="{{ $setting->biaya }}">
                                @error('biaya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <button class="btn btn-danger" type="submit">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
