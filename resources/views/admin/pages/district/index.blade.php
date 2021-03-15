@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage District
        </div>
        <div class="card-body">
          @include('admin.partials.messages')
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Division</th>
              <th>Action</th>
            </tr>
            @foreach($districts as $district)
            <tr>
              <td>#</td>
              <td>{{ $district->name }}</td>
              <td>{{ $district->division->name }}</td>
              <td>
                <a href="{{ route('admin.district.edit',$district->id ) }}" class="btn btn-success">Edit</a>
                <a href="{{ route('admin.district.delete',$district->id ) }}" class="btn btn-danger">Delete</a>
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
