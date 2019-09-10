@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
<div class="col-offset-4">
<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit">
</div>
</form>
</div>
<hr>
<div class="container">
<div class="row">
    <div class="col-6">
@if(isset($prisoner))
<?php
$url=env('APP_URL');
$prisoner_image=$prisoner->image;
$image=$url.$prisoner_image;
?>
<div class="card">
  <img src="{{$image}}" class="card-img-top" alt="..." style=" width:100px; height:100px;">
  <div class="card-body">
    <h5 class="card-title"><b>Name:</b> {{$prisoner->first_name}} {{$prisoner->last_name}}</h5>
    <p class="card-text"><b>Status:</b>{{$prisoner->outcome}}</p>
    <a href="{{route('ki',$prisoner->id)}}" class="btn btn-primary">Check details
    </a>
  </div>
</div>
</div>
@endif
</div>
</div>
</div>
   </div>
</div>
@endsection