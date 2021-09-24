@extends('Doctor.base')
@section('Doctor','active')
@section('content')
@if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    {{ session('message') }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span>
    </button>
    </div>
@endif
   <div class="container mt-4">
       <div class="row">
           <div class="col-3">
                <div class="card bg-danger text-white py-3">
                    <div class="card-body">
                        <h2>{{ $patient->count()}} +</h2>
                        <h6>Total Patient</h6>
                    </div>
                </div>
            </div>
       </div>
   </div>
@endsection
