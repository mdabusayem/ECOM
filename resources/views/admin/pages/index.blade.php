@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card card-body">
      <h3>Welcome To Admin Panel</h3>
      <br>
      <br>
      <p>
        <a href="{{ route('index') }} " class="btn btn-primary btn-lg" target="_blank">Visit Main Site</a>
      </p>
    </div>    
  </div>
</div>
  <!-- main-panel ends -->
@endsection
