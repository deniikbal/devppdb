<div id="sendwa{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Kirim WA</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('sendwa', $item)}}" method="post">
                @method('PUT')
                @csrf
            <div class="modal-body">
                <p class="mg-b-0">Apakah Anda yakin akan mengirim WA konfirmasi pembayaran? <span class="tx-danger">
                      </span>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger tx-13">Ya, Kirim WA</button>
            </div>
            </form>
        </div>
    </div>
</div>
