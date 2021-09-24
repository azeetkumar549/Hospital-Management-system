@extends('Admin.base')
@section('admin','active')
@section('content')
   <div class="container mt-4">
       <div class="row">
           <div class="col-3">
               <div class="card bg-success text-white py-3">
                   <div class="card-body">
                        <h2>{{ $user->where('user_type','doctor')->count()}} +</h2>
                        <h6>Total Doctor</h6>
                   </div>
               </div>
           </div>
           <div class="col-3">
               <div class="card bg-info text-white py-3">
                    <div class="card-body">
                        <h2>{{ $user->where('user_type','staff')->count()}} +</h2>
                        <h6>Total staff</h6>
                    </div>
               </div>
           </div>
           <div class="col-3">
                <div class="card bg-danger text-white py-3">
                    <div class="card-body">
                        <h2>{{ $addbranches->count()}} +</h2>
                        <h6>Total Branch</h6>
                    </div>
                </div>
            </div>
           <div class="col-3">
                <div class="card bg-danger text-white py-3">
                    <div class="card-body">
                        <h2>{{ $patients->count()}} +</h2>
                        <h6>Total Patient</h6>
                    </div>
                </div>
            </div>
       </div>
   </div>
@endsection
