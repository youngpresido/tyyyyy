@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
<a href="{{ flexcodesdk::getRegistrationLink($prison) }}">click fingerprint</a>
</div>
</div>
</div>


@endsection