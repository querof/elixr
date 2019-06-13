@extends('layout')

@section('cssmodule')

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Add File</h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Something went wrong<br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('fileReference.store') }}" method="POST" name="add_fileReference">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Mime Type</strong>
                <input type="text" name="mime" class="form-control" placeholder="Mime Type">
            </div>
        </div>
        {{-- <div class="col-md-12">
            <div class="form-group">
                <input id="fileupload" type="file" name="files[]" data-url="{{route('fileReference.store')}}" multiple>
                <div id="dropzone" class="fade well">Drop files here</div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <button id="save" type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

</form>
@endsection
 
