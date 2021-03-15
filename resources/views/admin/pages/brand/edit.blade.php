@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Brand
        </div>
        <div class="card-body">
          <form action="{{ route('admin.brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('admin.partials.messages')
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $brand->name }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control">{{ $brand->description }}</textarea>

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Brand Image</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="brand_image" id="brand_image" >
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Brand</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
