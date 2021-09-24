@extends('Admin.base')
@section('manage_branch','active')
@section('content')
@if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('message') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">X</span>
        </button>
        </div>
@endif
    <h1 class="mb10">Manage_branch</h1>
    <a href="{{ route('addbranch') }}">
    <button type="button" class="btn btn-primary">Add_Branch</button>
    </a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>#id</th>
                    <th>Branch Name</th>
                    <th>Amount</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($addbranches as $branch )
                        <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->branch_name }}</td>
                            <td>RS.{{ $branch->amount }}/-</td>
                            <td class="d-flex">
                            <a href="{{ route('update.branch',$branch->id) }}"><button type="button" class="btn btn-success">Edit</button></a>

                                <form action="{{ route('deletebranch',$branch->id) }}" method="POST">
                                    @method("delete")@csrf
                                    <input type="submit" class="btn btn-danger " value="delete">
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
