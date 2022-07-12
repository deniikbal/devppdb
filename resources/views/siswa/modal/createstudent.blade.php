<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DAFTAR SISWA BARU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('students.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Nama Lengkap" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">--Pilih--</option>
                                <option value="Laki-laki" {{old('jenis_kelamin')=="Laki-laki" ? 'selected' : ''}}>Laki-laki</option>
                                <option value="Perempuan" {{old('jenis_kelamin')=="Perempuan" ? 'selected' : ''}}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kecamatan Domisili</label>
                        <div class="col-sm-8">
                            <input type="text" name="kecamatan_pd" class="form-control @error('kecamatan_pd') is-invalid @enderror"
                                   placeholder="Kecamatan Tempat Tinggal" value="{{old('kecamatan_pd')}}">
                            @error('kecamatan_pd')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-8">
                            <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror"
                                   placeholder="Asal Sekolah" value="{{old('asal_sekolah')}}">
                            @error('asal_sekolah')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">No Whatsapp Calon Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nohp_siswa" class="form-control @error('nohp_siswa') is-invalid @enderror"
                                   placeholder="085722671817" value="{{old('nohp_siswa')}}">
                            @error('nohp_siswa')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">DAFTAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
