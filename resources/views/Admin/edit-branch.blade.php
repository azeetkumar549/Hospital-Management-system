
@extends('Admin.base')
@section('addbranch','active')

@section('content')
    <h1 class="mb10">Add_branch</h1>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('update.branch',['id'=>$branches]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Branch Name	</label>
                            <input type="text" name="branch_name" value="{{$branches->branch_name}}" class="form-control">
                            @error('branch_name')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Amount per patient</label>
                            <input type="number" name="amount" value="{{$branches->amount}}" class="form-control">
                            @error('amount')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success w-100">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
