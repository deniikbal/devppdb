<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DAFTAR SISWA BARU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="image-upload" method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Nama Lengkap" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ayah</label>
                        <div class="col-sm-8">
                            <input type="text" name="namaayah" id="namaayah" class="form-control @error('namaayah') is-invalid @enderror"
                                   placeholder="Nama Ayah" value="{{old('namaayah')}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                <option value="">--Pilih--</option>
                                <option value="Laki-laki" {{old('jenis_kelamin')=="Laki-laki" ? 'selected' : ''}}>Laki-laki</option>
                                <option value="Perempuan" {{old('jenis_kelamin')=="Perempuan" ? 'selected' : ''}}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kecamatan Domisili</label>
                        <div class="col-sm-8">
                            <input type="text" name="kecamatan_pd" id="kecamatan_pd" class="form-control @error('kecamatan_pd') is-invalid @enderror"
                                   placeholder="Kecamatan Tempat Tinggal" value="{{old('kecamatan_pd')}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kabupaten Domisili</label>
                        <div class="col-sm-8">
                            <input type="text" name="kota_pd" id="kota_pd" class="form-control @error('kota_pd') is-invalid @enderror"
                                   placeholder="Kota/Kabupaten Tempat Tinggal" value="{{old('kota_pd')}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" id="asal_sekolah" name="asal_sekolah">
                                <option value="">---Pilih---</option>
                                @foreach($schools as $item)
                                    <option value="{{$item->name}}"{{ $item->name==old('asal_sekolah') ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">No Whatsapp Calon Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nohp_siswa" id="nohp_siswa" class="form-control @error('nohp_siswa') is-invalid @enderror"
                                   placeholder="085722671817" value="{{old('nohp_siswa')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="formSubmit">Daftar Siswa</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap",
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#formSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {

                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    }
                });
                $.ajax({
                    url: "{{ url('/students') }}",
                    method: 'post',
                    data: {
                        name: $('#name').val(),
                        namaayah:$('#namaayah').val(),
                        jenis_kelamin:$('#jenis_kelamin').val(),
                        kecamatan_pd:$('#kecamatan_pd').val(),
                        kota_pd:$('#kota_pd').val(),
                        asal_sekolah:$('#asal_sekolah').val(),
                        nohp_siswa:$('#nohp_siswa').val(),
                    },
                    success: function(result){
                        if(result.errors)
                        {
                            $('.alert-danger').html('');
                            $.each(result.errors, function(key, value){
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                        else
                        {
                            $('.alert-danger').hide();
                            $(".modal-body input").val("")
                            $('#exampleModal').modal('hide');
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>

@endsection
