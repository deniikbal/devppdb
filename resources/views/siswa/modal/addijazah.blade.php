<div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="label-modal-confirm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Upload Ijazah</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" class="filepond" id="ijazah" name="ijazah" data-allow-reorder="true"
                       data-max-file-size="3MB" accept="image/png, image/jpeg, image/gif">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger tx-13">Ya, Kirim WA</button>
            </div>
        </div>
    </div>
</div>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
    );
    const inputElement = document.querySelector('input[id="ijazah"]');
    const pond = FilePond.create(inputElement, {
        labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1'
    });

    FilePond.setOptions({
        server: {
            url: '/upload/{{$student->id}}',
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}',
            }
        }
    });
</script>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Ijazah SD: <span class="tx-danger">*</span></label>
    <div class="col-sm-6">
        <input type="file" class="filepond" id="ijazah" name="ijazah" data-allow-reorder="true"
               data-max-file-size="3MB" accept="image/png, image/jpeg, image/gif">
    </div>
    <div class="col-sm-4">
        @if($student->foto==null)
            <img id="image" src="{{ asset('assets/img/pp.jpg') }}" style="width: 150px;height: 200px"
                 class="img-thumbnail" alt="Responsive image">
        @else
            <img id="image" src="{{ asset('storage/' . $student->ijazah) }}"
                 style="width: 250px;height: 300px"
                 class="img-thumbnail" alt="Responsive image">
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kartu Keluarga: <span class="tx-danger">*</span></label>
    <div class="col-sm-6">
        <input type="file" class="filepond" id="kk" name="kk" data-allow-reorder="true"
               data-max-file-size="3MB" accept="image/png, image/jpeg, image/gif">
    </div>
    <div class="col-sm-4">
        @if($student->foto==null)
            <img id="image" src="{{ asset('assets/img/pp.jpg') }}" style="width: 150px;height: 200px"
                 class="img-thumbnail" alt="Responsive image">
        @else
            <img id="image" src="{{ asset('storage/' . $student->ijazah) }}"
                 style="width: 250px;height: 300px"
                 class="img-thumbnail" alt="Responsive image">
        @endif
    </div>
</div>
