
@extends('Admin.base')
@section('manage_admin_Patient','active')
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
                        <th>Branch</th>
                        <th>city</th>
                        <th>State</th>
                        <th>age</th>
                        <th>Amount</th>
                        <th>Staff name</th>
                        <!-- <th>action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patients )
                   
                        <tr>
                            <td>{{ $patients->id }}</td>
                            <td>{{ $patients->name }}</td>
                            <td>{{ $patients->phone_no }}</td>
                            <td>{{ $patients->user->addbranch->branch_name}}</td>
                            <td>{{ $patients->city }}</td>
                            <td>{{ $patients->state }}</td>
                            <td>{{ $patients->age }}</td>
                            <td>RS. {{ $patients->user->addbranch->amount}}/-</td>
                            <td>{{ $patients->user->username}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
