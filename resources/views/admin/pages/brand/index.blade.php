@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Brand
        </div>
        <div class="card-body">
          @include('admin.partials.messages')
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            @foreach($brands as $brand)
            <tr>
              <td>#</td>
              <td>{{ $brand->name }}</td>
              <td>
                <img src="/images/brand/{{ $brand->image }}" width="50" height="50"></td>
              <td>
                <a href="{{ route('admin.brand.edit',$brand->id ) }}" class="btn btn-success">Edit</a>
                <a href="{{ route('admin.brand.delete',$brand->id ) }}" class="btn btn-danger">Delete</a>
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
