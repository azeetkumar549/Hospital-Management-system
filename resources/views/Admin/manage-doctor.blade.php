@extends('Admin.base')
@section('manage_doctor','active')
@section('content')
@if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{ session('message') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">X</span>
        </button>
        </div>
@endif
    <h1 class="mb10">Manage_Doctor</h1>
    <a href="{{ route('add_doctor') }}">
    <button type="button" class="btn btn-primary">Add_Doctor</button>
    </a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>#id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Branch</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users )
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->username }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone_no }}</td>
                            <td>{{ $users->addbranch->branch_name }}</td>

                            <td class="d-flex">
                            <a href="{{ route('update.doctor',$users->id) }}"><button type="button" class="btn btn-success">Edit</button></a>
                           
                            <form action="{{ route('deleteuser',$users->id) }}" method="POST">
                                    @method("delete")@csrf
                                    <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
