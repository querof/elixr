@extends('form')

@section('form_data')

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Update Media File</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('fileReference.update', $fileReference_info->id) }}" method="POST" name="update_fileReference">
    {{ csrf_field() }}
    @method('PATCH')

     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $fileReference_info->name }}">
            </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <strong>Mime Type</strong>
              <input type="text" name="mime" class="form-control disable" placeholder="Mime Type" value="{{ $fileReference_info->mime }}">
          </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $fileReference_info->description }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('fileReference.index')}}" class="btn">Back to List</a>
                <a href="{{ route('download',$fileReference_info->id)}}" class="btn">Download File</a>
        </div>
    </div>

</form>
@endsection
