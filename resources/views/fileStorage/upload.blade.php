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

 <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
      {{-- <div class="col-md-12">
            <div class="form-group">
                <input id="fileupload" type="file" name="files[]" data-url="{{route('fileReference.store')}}" multiple>
                <div id="dropzone" class="fade well">Drop files here</div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <button id="save" type="buton" class="btn btn-primary">Save</button>
        </div>
    </div>
    
@endsection

@section('jsmodule')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
<script>
    var maxFileSize = '{{config('upload.MAX_FILE_SIZE')}}';
    var maxChunkSize = '{{config('upload.MAX_CHUNK_SIZE')}}';

    var uploadPath = '{{route('upload')}}';
    var donePath = '{{route('done')}}';
    var rollbackPath = '{{route('rollback')}}';
</script>
<script src="{{ asset('js/fileUpload/fileObject.js') }}"></script>
<script src="{{ asset('js/fileUpload/fileSender.js') }}"></script>
@endsection
