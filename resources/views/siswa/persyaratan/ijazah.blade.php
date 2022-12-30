@extends('layouts.student.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Upload</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ijazah</li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-danger d-flex justify-content-end">
            <a href="{{route('editcard', $student)}}" class="btn btn-dark">
                <i data-feather="chevron-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="container">
                <input type="file" class="filepond" id="ijazah" name="ijazah" data-allow-reorder="true"
                       data-max-file-size="3MB" accept="image/png, image/jpeg, image/gif">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
        </div>
    </div>
@endsection

@section('script')
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
        );
        const inputElement = document.querySelector('input[id="ijazah"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag and Drop Your Image <span class="filepond--label-action">Browse</span>`,
            imageCropAspectRatio: '1:1'
        });

        FilePond.setOptions({
            server: {
                url:'/upload/{{$student->id}}',
                headers : {
                    'X-CSRF-TOKEN':'{{csrf_token()}}',
                }
            }
        });
    </script>
@endsection


