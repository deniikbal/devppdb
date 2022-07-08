<div class="modal fade" id="editbayar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran {{$item->id_bayar}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updatebayar', $item->id)}}" method="Post" data-parsley-validate
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="oldfile" value="{{ $item->bukti_bayar }}">
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Jenis Pembayaran: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="jenis_pembayaran" value="" required>
                                <option value="">--Pilih--</option>
                                <option value="tdu" {{$item->jenis_pembayaran=='tdu' ? 'selected': ''}}>Titipan Daftar Ulang</option>
                                <option value="du" {{$item->jenis_pembayaran=='du' ? 'selected': ''}}>Daftar Ulang</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nominal: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$item->nominal}}" name="nominal">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tanggal Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="tanggal" value="{{$item->tanggal}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Jenis Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="jenis_bayar" required>
                                <option value="">--Pilih--</option>
                                <option value="transfer" {{$item->jenis_bayar=='transfer' ? 'selected' : ''}}>Transfer</option>
                                <option value="cash" {{$item->jenis_bayar=='cash' ? 'selected' : ''}}>Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Bukti Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="bukti_bayar">
                        </div>
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
