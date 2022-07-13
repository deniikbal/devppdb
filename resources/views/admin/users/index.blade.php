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
                    <th class="wd-10p">Avatar</th>
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
                        <td><div class="avatar avatar-md"><img src="{{asset('storage/'.$user->avatar)}}" class="rounded-circle" alt=""></div></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge badge-primary">Admin</span>
                            @elseif($user->role == 'siswa')
                                <span class="badge badge-success">Siswa</span>
                        @endif

                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edituser{{$user->id}}">
                                <i class="fas fa-user"></i>
                            </button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#test{{$user->id}}"><i class="fas fa-key"></i></button>
                            <form action="{{route('destroy',$user)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @include('admin.users.modal.updateuser')
                    @include('admin.users.modal.editpass')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($users as $user)
        <div class="modal fade tambahdata" id="test{{$user->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('changepass',$user)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-group" style="margin-bottom: 2px;">
                                <label for="jumlah">New Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary btntest"><i class="fas fa-share-alt"></i> Save
                        </button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @include('admin.users.modal.adduser')
@endsection
