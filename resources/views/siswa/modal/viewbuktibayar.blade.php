<div class="modal fade" id="viewsertifikat{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ $item->id_bayar }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/' . $item->bukti_bayar . '#zoom=50') }}" frameborder="0" width="100%" height="100%" frameborder="0" allowfullscreen>
            </div>
        </div>
    </div>
</div>
