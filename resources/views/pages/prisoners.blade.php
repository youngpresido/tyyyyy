@extends('partials.master')

@section('content')
<div id="wrapper">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
   <div class="row">
      <div class="col-6">
         <a href="" class="btn btn-lg btn-success">Search with biometric</a>

      </div>
      <div class="col-6">
      <a href="{{URL('/facetsearch')}}" class="btn btn-lg btn-success">Search with facial recognition</a>
      </div>
   </div>
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
         <th>Created_at</th>
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
            <td>{{$prisoner->ethnicity}}</td>
            <td>{{$prisoner->date_of_birth}}</td>
            <td>{{$prisoner->created_at}}</td>
            <td>{{$prisoner->personnel}}</td>
            <td><button class="edit-modal btn btn-info"
            data-info="{{$prisoner->id}},{{$prisoner->first_name}},{{$prisoner->last_name}},{{$prisoner->sex}},{{$prisoner->ethnicity}},{{$prisoner->soc_number}},{{$prisoner->state}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
        <button class="delete-modal btn btn-danger"
            data-info="{{$prisoner->id}},{{$prisoner->first_name}},{{$prisoner->last_name}},{{$prisoner->sex}},{{$prisoner->ethnicity}},{{$prisoner->soc_number}},{{$prisoner->state}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </button></td>
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
} );
 </script>
@endpush