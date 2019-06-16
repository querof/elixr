@extends('layout')


@section('content')
  <div class="card">
    <div class="card-header">
      <h5 class="card-title"> Form </h5>
      <h6 class="card-subtitle text-muted"> </h6>
    </div>
    <div class="card-body">
      @yield('form_data')
    </div>
  </div>
@endsection
