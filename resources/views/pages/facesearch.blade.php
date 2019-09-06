@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit">
</form>
</div>
   </div>
</div>
@endsection