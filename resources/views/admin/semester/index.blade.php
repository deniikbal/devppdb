@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Data Semester</h5>
            <a class="btn btn-danger" href="{{route('semesters.create')}}">Add</a>
        </div>

        <div class="card-body">
            @if ($message = \Illuminate\Support\Facades\Session::get('status'))
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                </div>
            @elseif($message = \Illuminate\Support\Facades\Session::get('update'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @elseif($message = \Illuminate\Support\Facades\Session::get('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table id="example1" class="table">
                <thead>
                <tr>
                    <th class="wd-5p text-center">No</th>
                    <th class="wd-25p">Nama Semester</th>
                    <th class="wd-20p">Tahun</th>
                    <th class="wd-20p">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($semesters as $semester)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$semester->name}}</td>
                        <td>{{$semester->year}}</td>
                        <td >

                            <a href="{{route('semesters.edit', $semester)}}" class="btn btn-danger">Edit</a>
                            <form onclick="return confirm('yakin mau dihapus??')"
                                  action="{{route('semesters.destroy', $semester)}}" method="post"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-info" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
