<div class="modal fade" id="editpass{{$user->id}}" tabindex="-1"
     aria-labelledby="editpass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateuser', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="oldfile" value="{{ $user->avatar }}">
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Email: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$user->email}}" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Password: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$user->name}}" name="name">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">No Whatsapp: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nohp" value="{{$user->nohp}}">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Role: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="role" required>
                                <option value="admin" {{$user->role=='admin' ? 'selected' : ''}}>Admin</option>
                                <option value="siswa" {{$user->role=='siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Avatar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="avatar" value="">
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

