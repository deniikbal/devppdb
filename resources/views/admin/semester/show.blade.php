@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Add Data Semester</h5>
        </div>
        <div class="card-body">
            <form action="{{route('semesters.update', $semester)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="formGroupExampleInput" class="d-block">Semester</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{$semester->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2" class="d-block">Tahun</label>
                    <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{$semester->year}}">
                    @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{route('semesters.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
