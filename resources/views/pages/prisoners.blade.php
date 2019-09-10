@extends('partials.master')

@section('content')
<div id="wrapper">

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
   <table class="table table-bordered" id="users-table">
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
            </tr>
        </thead>
    </table>

</div>
   </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('allprisoner') !!}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'marital_status', name: 'marital_status' },
            { data: 'sex', name: 'sex' },
            { data: 'ethnicity', name: 'ethnicity' },
            { data: 'date_of_birth', name: 'date_of_birth' },
            { data: 'created_at', name: 'created_at' },
            { data: 'personnel', name: 'personnel' }
        ]
    });
});
</script>
@endpush