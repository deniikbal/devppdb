@foreach($students as $student)
    <div class="col-12 col-lg-5 mb-2">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-2 text-center">
                        <i class="far fa-check-circle fa-2x text-primary-dark"></i>
                    </div>
                    <div class="col-10">
                        <h6 class="card-title mb-0">
                            <a href="{{route('student.profile', $student)}}" class="stretched-link text-black text-decoration-none">
                                Verifikasi Data Sekolah atau Siswa</a>
                        </h6>
                        <table class="tg" style="undefined;table-layout: fixed; width: 283px">
                            <colgroup>
                                <col style="width: 131px">
                                <col style="width: 25px">
                                <col style="width: 127px">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="tg-0lax">No Pendaftaran</td>
                                <td class="tg-0lax">:</td>
                                <td class="tg-0lax">{{$student->nodaftar}}</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">Asal Sekolah</td>
                                <td class="tg-0lax">:</td>
                                <td class="tg-0lax">{{$student->asal_sekolah}}</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">No WhatsApp</td>
                                <td class="tg-0lax">:</td>
                                <td class="tg-0lax">{{$student->nohp_ortu}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
