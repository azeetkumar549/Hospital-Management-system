@extends('staff.staff-base')
@section('add_patient','active')

@section('content')
    <h1  class="mb10">Add_Staff</h1>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('add_patient')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone_no" class="form-control">
                            @error('phone_no')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control">
                            @error('city')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">state</label>
                            <input type="text" name="state" class="form-control">
                            @error('state')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control">
                            @error('age')
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
