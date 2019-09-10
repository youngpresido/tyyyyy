@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
{{ flexcodesdk::getRegistrationLink($prison) }}
</div>
</div>
</div>


@endsection