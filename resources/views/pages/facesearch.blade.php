@extends('partials.master')
@section('content')
<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit">
</form>
@endsection