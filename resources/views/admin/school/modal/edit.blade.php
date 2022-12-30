<div id="edit{{$school->id}}" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Edit School</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('school.update', $school->id)}}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput" class="d-block">Nama Sekolah</label>
                        <input type="text" name="name" value="{{$school->name}}" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Nama Sekolah">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2" class="d-block">NPSN</label>
                        <input type="text" name="npsn" value="{{$school->npsn}}" class="form-control @error('npsn') is-invalid @enderror"
                               placeholder="NPSN">
                        @error('npsn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2" class="d-block">Desa / Kelurahan</label>
                        <input type="text" name="desa" value="{{$school->desa}}" class="form-control @error('desa') is-invalid @enderror"
                               placeholder="NPSN">
                        @error('desa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2" class="d-block">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{$school->kecamatan}}" class="form-control @error('kecamatan') is-invalid @enderror"
                               placeholder="NPSN">
                        @error('kecamatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2" class="d-block">Kabupaten</label>
                        <input type="text" name="kabupaten" value="{{$school->kabupaten}}" class="form-control @error('kabupaten') is-invalid @enderror"
                               placeholder="NPSN">
                        @error('kabupaten')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2" class="d-block">Provinsi</label>
                        <input type="text" name="provinsi" value="{{$school->provinsi}}" class="form-control @error('provinsi') is-invalid @enderror"
                               placeholder="NPSN">
                        @error('provinsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger tx-13">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
