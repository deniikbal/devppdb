<div class="modal fade" id="viewpayment{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel4">View Pembayaran</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
            $bayar = \App\Models\Payment::with('student')->where('student_id', $item->id)
            ->where('verifikasi', '1')
            ->get();
            $setting = \App\Models\Setting::first();
            $total = \App\Models\Payment::where('student_id', $item->id)->where('verifikasi',1)->sum('nominal');
            $sisa = $setting->biaya - $total;
            @endphp
            <div class="modal-body">
                <table id="example2" class="table">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Nama Calon</th>
                            <th>Nomor Daftar</th>
                            <th>Id Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bayar as $item)
                            <tr>
                                <td class="text-center">{{ $no++ }}</a></td>
                                <td>{{$item->student->name}}</td>
                                <td>{{$item->student->nodaftar}}</td>
                                <td>{{$item->id_bayar}}</td>
                                <td>{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY')}}</td>
                                <td>
                                    <span class="badge badge-{{$item->jenis_pembayaran=="tp" ? 'info' :'warning'}}">
                                        {{\Illuminate\Support\Str::upper($item->jenis_pembayaran)}}
                                    </span><br>
                                    <span class="badge badge-danger">{{$item->keterangan}}</span>
                                </td>
                                <td>@currency($item->nominal)</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="table-success text-center" colspan="6">Total Pembayaran</td>
                            <td class="table-success text-center">@currency($total)</td>
                        </tr>
                        <tr>
                            <td class="table-dark text-center" colspan="6">Sisa Pembayaran</td>
                            <td class="table-dark text-center">
                                @if($sisa==0)
                                    <span class="badge badge-danger">Sudah Lunas</span>
                                @else
                                    @currency($sisa)
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tx-13">Save changes</button>
            </div>
        </div>
    </div>
</div>
