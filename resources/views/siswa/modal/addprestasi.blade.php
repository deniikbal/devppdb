<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addprestasi', $student)}}" method="Post" data-parsley-validate
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Kegiatan: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Misal : Lomba Karya Tulis Ilmiah"
                                   class="form-control" name="nama_kegiatan" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kegiatan: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('jenis_kegiatan') is-invalid @enderror"
                                    name="jenis_kegiatan" required>
                                <option value="">--Pilih--</option>
                                <option value="Individual">Individual</option>
                                <option value="Kelompok">Kelompok/Tim</option>
                            </select>
                            @error('jenis_kegiatan')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tingkat Lomba: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('tingkat') is-invalid @enderror" name="tingkat" required>
                                <option value="">--Pilih--</option>
                                <option value="Kabupaten">Kabupaten/Kota</option>
                                <option value="Provinsi">Provinsi</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                            @error('tingkat')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun Perolehan: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('tahun') is-invalid @enderror" name="tahun" required>
                                <option value="">--Pilih--</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            @error('tahun')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pencapaian: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('hasil') is-invalid @enderror" name="hasil" required>
                                <option value="">--Pilih--</option>
                                <option value="Juara 1">Juara 1</option>
                                <option value="Juara 2">Juara 2</option>
                                <option value="Juara 3">Juara 3</option>
                                <option value="Finalis">Finalis</option>
                                <option value="Peserta">Peserta</option>
                            </select>
                            @error('hasil')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Sertifikat: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="sertifikat" value="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
