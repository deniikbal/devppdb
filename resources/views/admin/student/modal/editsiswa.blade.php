<div class="modal fade" id="editsiswa{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}
                    ({{$item->nodaftar}})</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('edithpsiswa', $item->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nomor HP Siswa</label>
                        <input type="text" class="form-control" name="nohp_siswa"
                               value="{{$item->nohp_siswa}}" required>
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
