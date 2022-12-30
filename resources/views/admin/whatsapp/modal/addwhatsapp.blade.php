<div id="addwhatsapp" class="modal fade" tabindex="-1"
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
                <form action="{{route('wa.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="d-block">Api Key</label>
                        <input type="text" name="apikey" class="form-control @error('apikey') is-invalid @enderror"
                               placeholder="Api Key WA">
                        @error('apikey')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" class="d-block">Sender</label>
                        <input type="text" name="sender" class="form-control @error('sender') is-invalid @enderror"
                               placeholder="085155333252">
                        @error('sender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" class="d-block">Keterangan</label>
                        <select name="ket" class="form-control @error('ket') is-invalid @enderror">
                            <option value="">Pilih Keterangan</option>
                            <option value="reguser">Reg User</option>
                            <option value="regstudent">Reg Student</option>
                        </select>
                        @error('ket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" class="d-block">Message</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                  rows="3"></textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary tx-13">Ya, simpan permanen</button>
            </div>
            </form>
        </div>
    </div>
</div>
