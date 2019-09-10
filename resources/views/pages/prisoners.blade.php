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
            <td>{{$prisoner->ethnicity}}</td>
            <td>{{$prisoner->date_of_birth}}</td>
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
$(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });

    function fillmodalData(details){
    $('#fid').val(details[0]);
    $('#fname').val(details[1]);
    $('#lname').val(details[2]);
    $('#email').val(details[3]);
    $('#gender').val(details[4]);
    $('#country').val(details[5]);
    $('#salary').val(details[6]);
}
$('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('#fname').val(),
                'lname': $('#lname').val(),
                'email': $('#email').val(),
                'gender': $('#gender').val(),
                'country': $('#country').val(),
                'salary': $('#salary').val()
            },
            success: function(data) {
                if (data.errors){
                    $('#myModal').modal('show');
                    if(data.errors.fname) {
                        $('.fname_error').removeClass('hidden');
                        $('.fname_error').text("First name can't be empty !");
                    }
                    if(data.errors.lname) {
                        $('.lname_error').removeClass('hidden');
                        $('.lname_error').text("Last name can't be empty !");
                    }
                    if(data.errors.email) {
                        $('.email_error').removeClass('hidden');
                        $('.email_error').text("Email must be a valid one !");
                    }
                    if(data.errors.country) {
                        $('.country_error').removeClass('hidden');
                        $('.country_error').text("Country must be a valid one !");
                    }
                    if(data.errors.salary) {
                        $('.salary_error').removeClass('hidden');
                        $('.salary_error').text("Salary must be a valid format ! (ex: #.##)");
                    }
                }
                 else {
                     
                     $('.error').addClass('hidden');
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
                        data.id + "</td><td>" + data.first_name +
                        "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td>" +
                         data.gender + "</td><td>" + data.country + "</td><td>" + data.salary +
                          "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");}}
        });
    });
 </script>
 
@endpush