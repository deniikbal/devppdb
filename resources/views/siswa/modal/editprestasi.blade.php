<div class="modal fade" id="prestasi{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateprestasi', $item->id)}}" method="Post" data-parsley-validate
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="oldfile" value="{{ $item->sertifikat }}">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Kegiatan: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Misal : Lomba Karya Tulis Ilmiah"
                                   class="form-control" name="nama_kegiatan" value="{{$item->nama_kegiatan}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kegiatan: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('jenis_kegiatan') is-invalid @enderror"
                                    name="jenis_kegiatan" required>
                                <option value="">--Pilih--</option>
                                <option value="Individual" {{$item->jenis_kegiatan=='Individual' ? 'selected': ''}}>Individual</option>
                                <option value="Kelompok" {{$item->jenis_kegiatan=='Kelompok' ? 'selected': ''}}>Kelompok/Tim</option>
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
                                <option value="Kabupaten" {{$item->tingkat == 'Kabupaten' ? 'selected': ''}}>Kabupaten/Kota</option>
                                <option value="Provinsi" {{$item->tingkat == 'Provinsi' ? 'selected': ''}}>Provinsi</option>
                                <option value="Nasional" {{$item->tingkat == 'Nasional' ? 'selected': ''}}>Nasional</option>
                                <option value="Internasional" {{$item->tingkat == 'Internasional' ? 'selected': ''}}>Internasional</option>
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
                                <option value="2018" {{$item->tahun =='2018' ? 'selected':''}}>2018</option>
                                <option value="2019" {{$item->tahun =='2019' ? 'selected':''}}>2019</option>
                                <option value="2020" {{$item->tahun =='2020' ? 'selected':''}}>2020</option>
                                <option value="2021" {{$item->tahun =='2021' ? 'selected':''}}>2021</option>
                                <option value="2022" {{$item->tahun =='2022' ? 'selected':''}}>2022</option>
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
                                <option value="Juara 1" {{$item->hasil == 'Juara 1' ? 'selected':''}}>Juara 1</option>
                                <option value="Juara 2" {{$item->hasil == 'Juara 2' ? 'selected':''}}>Juara 2</option>
                                <option value="Juara 3" {{$item->hasil == 'Juara 3' ? 'selected':''}}>Juara 3</option>
                                <option value="Finalis" {{$item->hasil == 'Finalis' ? 'selected':''}}>Finalis</option>
                                <option value="Peserta" {{$item->hasil == 'Peserta' ? 'selected':''}}>Peserta</option>
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
