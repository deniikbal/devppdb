<div id="delete{{$item->id}}" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Hapus</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mg-b-0">Apakah Anda yakin akan Menghapus <span class="text-bold">{{$item->student->name}}</span>? <span class="tx-danger">Pastikan
                                    data yang telah Anda isikan telah diperiksa dengan benar</span>.</p>
            </div>
            <form action="{{route('test.delete', $item)}}" method="post">
                @method('PUT')
                @csrf
                <input type="hidden" value="{{$item->student_id}}" name="studentid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger tx-13">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
