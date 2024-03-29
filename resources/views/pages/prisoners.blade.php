@extends('partials.master')

@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">
   <div class="row">
      <div class="col-9">
         <a href="" class="btn btn-lg btn-success">Search with biometric</a>

      </div>
      <div class="col-3" style="margin-left:0;">
      <a href="{{URL('/facetsearch')}}" class="btn btn-lg btn-success">Search with facial recognition</a>
      </div>
   </div>
   <hr>
<div class="container-fluid">
   
   <table class="table table-bordered" id="table">
        <thead>
            <tr>
            <th>id</th> 
        
        <th>SOC number</th>


        
        <th>First Name</th>
        <th>Last Name</th>
        <th>State</th>
        <th>Marital Status</th>
        <th>Sex</th>
        <th>Ethnicity</th>
        <th>Date of Birth</th>
         <th>Personnel</th>
         <th>Actions</th>
            </tr>
        </thead>
        <tbody>
         @if($prisoners->isEmpty())
         <tr>
            <td>No Data yet</td>
</tr>
@else

         @foreach($prisoners as $prisoner)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$prisoner->soc_number}}</td>
            <td>{{$prisoner->first_name}}</td>
            <td>{{$prisoner->last_name}}</td>
            <td>{{$prisoner->state}}</td>
            <td>{{$prisoner->marital_status}}</td>
            <td>{{$prisoner->sex}}</td>
            <td>
            @if($prisoner->ethnicity=="1")
                  Hausa
               @elseif($prisoner->ethnicity=="2")
               Yoruba
               @elseif($prisoner->ethnicity=="3")
               Igbo
               @endif

            </td>
            <td>{{$prisoner->date_of_birth}}</td>
            <td>{{$prisoner->personnel}}</td>
            <td>
            <a href="{{route('ki',$prisoner->id)}}" class=" btn btn-primary">
           
           <span class="glyphicon glyphicon-message"></span> View Details
</a>   
            <!-- <a href="" class="btn btn-info">
            
            <span class="glyphicon glyphicon-edit"></span> Edit
</a> -->
        <!-- <a href="" class=" btn btn-danger">
           
            <span class="glyphicon glyphicon-trash"></span> Delete
</a> -->
</td>
        </tr>
      @endforeach
   @endif
    </tbody>
    </table>

</div>
   </div>
</div>
@endsection

@push('scripts')

<script>
  $(document).ready(function() {
    $('#table').DataTable();
});
 </script>
 
@endpush