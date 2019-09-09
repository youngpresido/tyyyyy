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
   </div>
</div>
@endsection