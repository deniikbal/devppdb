<div class="modal fade" id="viewsertifikat{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>No Surat : {{ $item->nama_kegiatan }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/' . $item->sertifikat . '#zoom=50') }}" frameborder="0" width="100%" height="100%" frameborder="0" allowfullscreen>
            </div>
        </div>
    </div>
</div>
