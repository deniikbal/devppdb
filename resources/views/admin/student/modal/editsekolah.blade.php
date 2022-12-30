<div class="modal fade" id="editsekolah{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$item->asal_sekolah}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editsakolabudak', $item->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Nama Sekolah Dahulu</label>
                        <select class="form-control select2" name="asal_sekolah">
                            <option>---Pilih---</option>
                            @foreach($schools as $school)
                                <option value="{{$school->name}}">{{$school->name}}</option>
                            @endforeach
                        </select>
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
