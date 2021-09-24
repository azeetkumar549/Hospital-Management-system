@extends('staff.staff-base')

@section('content')
   <div class="container mt-4">
       <div class="row">
           <div class="col-6">
               <div class="card bg-success text-white py-3">
                   <div class="card-body">
                        <h2>{{ $patients->count()}}+</h2>
                        <h6>Total Patient</h6>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
