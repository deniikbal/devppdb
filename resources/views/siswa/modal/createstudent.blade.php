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
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kecamatan Domisili</label>
                        <div class="col-sm-8">
                            <input type="text" name="kecamatan_pd" class="form-control"  placeholder="Kecamatan Tempat Tinggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-8">
                            <input type="text" name="asalsekolah" class="form-control"  placeholder="Asal Sekolah" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">No Whatsapp Calon Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nohp_siswa" class="form-control"  placeholder="085722671817">
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
