@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Data Users</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">
                <i data-feather="plus-square"></i>
            </button>
        </div>

        <div class="card-body">
                <table id="example2" class="table">
                    <thead>
                    <tr>
                        <th class="wd-5p text-center">No</th>
                        <th class="wd-25p">Name</th>
                        <th class="wd-20p">Email</th>
                        <th class="wd-15p">Role</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge badge-primary">Admin</span>
                            @elseif($user->role == 'siswa')
                                <span class="badge badge-success">Siswa</span>
                            @endif

                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edituser{{$user->id}}">
                                Edit
                            </button>
                            <form action="{{route('destroy',$user)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @include('admin.users.modal.updateuser')
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>

    @include('admin.users.modal.adduser')

@endsection
