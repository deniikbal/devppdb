<div class="modal fade" id="tambahbayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addpayment', $student)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Jenis Pembayaran: <span
                                    class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control @error('jenis_pembayaran') is-invalid @enderror"
                                    name="jenis_pembayaran">
                                <option value="">--Pilih--</option>
                                @if($count==0)
                                    <option value="tp">Titipan Pembayaran</option>
                                @else
                                    <option value="tdu">Titipan Daftar Ulang</option>
                                @endif
                            </select>
                            @error('jenis_pembayaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nominal: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            @if($count==0)
                                <input type="text" class="form-control" name="nominal" value="300000" disabled>
                            @else
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                       value="{{old('nominal')}}" name="nominal">
                                @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tanggal Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                   name="tanggal">
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Jenis Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control @error('jenis_bayar') is-invalid @enderror" name="jenis_bayar">
                                <option value="">--Pilih--</option>
                                <option value="transfer">Transfer</option>
                                <option value="cash">Cash</option>
                            </select>
                            @error('jenis_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Bukti Bayar: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @error('bukti_bayar') is-invalid @enderror"
                                   name="bukti_bayar">
                            @error('bukti_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if($count==0)
                    @else
                        <input type="hidden" name="keterangan" value="Cicilan Ke {{$count}}">
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
