<div id="lulus{{$item->id}}" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Lulus</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mg-b-0">Apakah Anda yakin akan Meluluskan {{$item->name}}? <span class="tx-danger">Pastikan
                                    data yang telah Anda isikan telah diperiksa dengan benar</span>.</p>
            </div>
            <form action="{{route('lulus', $item)}}" method="post">
                @method('PUT')
                @csrf
                <input type="hidden" value="{{$item->student_id}}" name="studentid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary tx-13">Ya, Lulus</button>
                </div>
            </form>
        </div>
    </div>
</div>
