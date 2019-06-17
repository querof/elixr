@extends('form')

@section('form_data')


    <div class="pull-left">
        <h2>Update Media File</h2>
    </div>


<form action="{{ route('fileReference.update', $fileReference_info->id) }}" method="POST" name="update_fileReference" class="form-horizontal">
    {{ csrf_field() }}
    @method('PATCH')

    <div class="col-md-10">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $fileReference_info->name }}">
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group">
            <strong>Mime Type</strong>
            <input type="text" name="mime" class="form-control disable" placeholder="Mime Type" value="{{ $fileReference_info->mime }}">
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description">{{ $fileReference_info->description }}</textarea>
        </div>
    </div>
    <div class="col-md-10">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>{{' '}}Save</button>
        <a href="{{ route('fileReference.index')}}" class="btn"><i class="fa fa-list"></i>{{' '}}Back to List</a>
        <a href="{{ route('download',$fileReference_info->id)}}" class="btn btn-warning">Download File</a>
    </div>
</form>

@endsection
