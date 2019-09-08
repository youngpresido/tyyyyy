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
{!! $dataTable->table() !!}
{{-- flexcodesdk::getRegistrationLink($prisoner_id) --}}
</div>
   </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush
