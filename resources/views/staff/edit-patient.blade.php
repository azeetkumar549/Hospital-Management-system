@extends('staff.staff-base')
@section('add_patient','active')

@section('content')
    <h1 class="mb10">Add_patient</h1>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">

                            <form action="{{ route('update',['id'=>$patients]) }}"  method="post">
                                    @csrf

                                        <div class="form-group mb-2">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{$patients->name}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">contact</label>
                                            <input type="text" name="phone_no" value="{{$patients->phone_no}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">city</label>
                                            <input type="text" name="city" value="{{$patients->city}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">state</label>
                                            <input type="text" name="state" value="{{$patients->state}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">age</label>
                                            <input type="text" name="age" value="{{$patients->age}}" class="form-control">
                                        </div>

                                    </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>

                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
