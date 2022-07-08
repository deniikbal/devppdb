<div id="addpayment" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="label-modal-confirm">Add Payment</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label">Jenis Pembayaran: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control select2" name="jenis_pembayaran" required>
                            <option label="Choose one"></option>
                            <option value="Firefox">Firefox</option>
                            <option value="Chrome">Chrome</option>
                            <option value="Safari">Safari</option>
                            <option value="Opera">Opera</option>
                            <option value="Internet Explorer">Internet Explorer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary tx-13">Ya, simpan permanen</button>
            </div>
        </div>
    </div>
</div>
