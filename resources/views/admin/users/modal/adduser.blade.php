<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('createuser')}}" method="post">
                    @csrf
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Email: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Password: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">No Whatsapp: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nohp">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Role: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="role" required>
                                <option value="">--Pilih--</option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
            </form>

        </div>
    </div>

