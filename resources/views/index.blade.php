<!DOCTYPE html>

<html>

<head>

    <title>Laravel Bootstrap Modal Form Validation Example - NiceSnippets.com</title>

    <meta name="_token" content="{{csrf_token()}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" target="_blank" rel="nofollow"  integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>

</head>

<body>

<div class="container">

    <div class="col-md-8 offset-2 mt-5">

        <div class="card">

            <div class="card-header bg-info">

                <h5 class="text-white text-center">Laravel Bootstrap Modal Form Validation Example - NiceSnippets.com</h5>

            </div>

            <div class="card-body">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                    Open Form

                </button>

            </div>

        </div>

    </div>

</div>

<!-- Button trigger modal -->



<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Laravel Bootstrap Modal Form Validation Example - NiceSnippets.com</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="alert alert-danger" style="display:none"></div>

                <form class="image-upload" method="post" action="{{ route('store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label>Name</label>

                        <input type="text" name="name" id="name" class="form-control"/>

                    </div>

                    <div class="form-group">

                        <label>Author Name</label>

                        <input type="text" name="auther_name" id="auther_name" class="form-control"/>

                    </div>

                    <div class="form-group">

                        <label>Description</label>

                        <textarea name="description" class="textarea form-control" id="description" cols="40" rows="5"></textarea>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-success" id="formSubmit">Save</button>

            </div>

        </div>

    </div>

</div>

<script>

    $(document).ready(function(){

        $('#formSubmit').click(function(e){

            e.preventDefault();

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }

            });

            $.ajax({

                url: "{{ url('/test') }}",
                method: 'post',
                data: {
                    name: $('#name').val(),
                    auther_name: $('#auther_name').val(),
                    description: $('#description').val(),
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
                        $('#exampleModal').modal('hide');
                    }
                }
            });
        });
    });
</script>

</body>

</html>
