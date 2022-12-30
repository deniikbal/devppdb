<div class="modal fade" id="viewkk{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Kartu Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/' . $student->kk . '#zoom=50') }}" frameborder="0" width="100%" height="100%" frameborder="0" allowfullscreen>
            </div>
        </div>
    </div>
</div>
