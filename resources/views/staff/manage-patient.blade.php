@extends('staff.staff-base')
@section('manage_patient','active')
@section('content')
@if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('message') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">X</span>
        </button>
        </div>
@endif
    <h1 class="mb10">Manage_Patient</h1>
    <a href="{{route('add_patient')}}">
    <button type="button" class="btn btn-primary">Add_Patient</button>
    </a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>city</th>
                        <th>State</th>
                        <th>age</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($patient as $patients )
                <tr>
                    <td>{{ $patients->id }}</td>
                    <td>{{ $patients->name }}</td>
                    <td>{{ $patients->phone_no }}</td>
                    <td>{{ $patients->city }}</td>
                    <td>{{ $patients->state }}</td>
                    <td>{{ $patients->age }}</td>
                    <td class="d-flex">
                    <a href="{{ route('update',$patients->id) }}" class="btn btn-sm btn-secondary shadow-none border-0">Edit</a>
                        <form action="{{ route('delete',$patients->id) }}" method="POST">
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
