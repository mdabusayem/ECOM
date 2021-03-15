@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Category
        </div>
        <div class="card-body">
          @include('admin.partials.messages')
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Parent Category</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            @foreach($categories as $category)
            <tr>
              <td>#</td>
              <td>{{ $category->name }}</td>
              <td>
                @if ($category->parent_id==NULL)
                Primary Category
                @else
                {{ $category->parent->name }}
                @endif
              </td>
              <td>
                <img src="/images/category/{{ $category->image }}" width="50" height="50"></td>
              <td>
                <a href="{{ route('admin.category.edit',$category->id ) }}" class="btn btn-success">Edit</a>
                <a href="{{ route('admin.category.delete',$category->id ) }}" class="btn btn-danger">Delete</a>
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
