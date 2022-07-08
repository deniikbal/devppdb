@extends('layouts.main')
@section('content')
    <div class="container">
            <div class="col-12">
                <div class="card shadow-sm border-danger">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Data Whatsapp</p>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addwhatsapp">
                                Add Setting
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped" id="example2">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Api Key</th>
                                <th>Sender</th>
                                <th>Message</th>
                                <th>Ket</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($whatsapps as $whatsapp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$whatsapp->apikey}}</td>
                                    <td>{{$whatsapp->sender}}</td>
                                    <td>{{$whatsapp->message}}</td>
                                    <td>{{$whatsapp->ket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editwhatsapp{{$whatsapp->id}}">
                                            Edit
                                        </button>
                                        <form action="{{route('whatsapp.destroy',$whatsapp)}}" style="display:inline-block" method="post" >
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-primary btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @include('admin.whatsapp.modal.editwhatsapp')
                            @endforeach
                            </tbody>
                    </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
    </div>
    @include('admin.whatsapp.modal.addwhatsapp')
@endsection
