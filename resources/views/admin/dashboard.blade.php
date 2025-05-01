@extends('layouts.app')
 
 @section('content')
 <h1>Admin Dashboard</h1>
 <div class="container my-5">
     <div class="row mb-4">
         <div class="col-md-4">
             <div class="card text-center">
                 <div class="card-body">
                     <h5 class="card-title">Total Appointments</h5>
                     <p class="card-text">{{ $appointmentsCount }}</p>
                 </div>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card text-center">
                 <div class="card-body">
                     <h5 class="card-title">Total Customers</h5>
                     <p class="card-text">{{ $customersCount }}</p>
                 </div>
             </div>
         </div>
         <div class="col-md-4">
             <div class="card text-center">
                 <div class="card-body">
                     <h5 class="card-title">Total Services</h5>
                     <p class="card-text">{{ $servicesCount }}</p>
                 </div>
             </div>
         </div>
     </div>
 
     <h2 class="mb-4">Next 5 Upcoming Appointments</h2>
 <div class="table-responsive">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>Customer</th>
         <th>Service</th>
         <th>Date & Time</th>
       </tr>
     </thead>
     <tbody>
       @foreach($upcomingAppointments as $appt)
         <tr>
           <td>{{ $appt->user->name }}</td>
           <td>{{ $appt->service->name }}</td>
           <td>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}</td>
         </tr>
       @endforeach
     </tbody>
   </table>
 </div>
 @endsection