@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Division
        </div>
        <div class="card-body">
          @include('admin.partials.messages')
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Priority</th>
              <th>Action</th>
            </tr>
            @foreach($divisions as $division)
            <tr>
              <td>#</td>
              <td>{{ $division->name }}</td>
              <td>{{ $division->priority }}</td>
              <td>
                <a href="{{ route('admin.division.edit',$division->id ) }}" class="btn btn-success">Edit</a>
                <a href="{{ route('admin.division.delete',$division->id ) }}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
