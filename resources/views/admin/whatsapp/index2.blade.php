@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-danger">
                    <div class="card-header">
                        Setting WA Register
                    </div>
                    <div class="card-body">
                        <form action="{{route('whatsapp.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block">Api Key</label>
                                <input type="text" name="apikey" class="form-control @error('apikey') is-invalid @enderror" placeholder="Api Key WA">
                                @error('apikey')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2" class="d-block">Sender</label>
                                <input type="text" name="sender" class="form-control @error('sender') is-invalid @enderror" placeholder="085155333252">
                                @error('sender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2" class="d-block">Message</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="3"></textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="cancel">Cancel</button>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Setting WA Register Student
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
