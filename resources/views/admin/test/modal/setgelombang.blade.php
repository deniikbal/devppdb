<div class="modal fade" id="setgelombang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setting Gelombang Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('setgel')}}" method="post">
                    @csrf
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Set Gelombang Test:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="gelombang_test" value="{{$setting->gelombang_test}}">
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

