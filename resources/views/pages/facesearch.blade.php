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
<div class="container">
@if($prisoner)
<?php
$url=env('APP_URL');
$prisoner_image=$prisoner->image;
$image=$url.$prisoner_image;
?>
<div class="card" style="width: 18rem;">
  <img src="{{$image}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Name: {{$prisoner->first_name}} {{$prisoner->last_name}}</h5>
    <p class="card-text">{{$prisoner->outcome}}</p>
    <a href="{{route('ki',$prisoner->id)}}" class="btn btn-primary">Check details
    </a>
  </div>
</div>
</div>
@endif
</div>
   </div>
</div>
@endsection