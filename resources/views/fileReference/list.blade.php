@extends('list')

@section('list')

   <div class="col-md-10">
    <h2>Elixr - Media File</h2>
   </div>
   <div class="col-md-3">
    <button id="save" type="buton" class="btn btn-primary"><i class="fa fa-plus-square"></i>{{' '}}Add Media File</button>
    <br><br>
   </div>
   <br><br>

    <table class="table table-bordered" id="laravel_crud">
       <thead>
          <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Mime Type</th>
             <th>Created at</th>
             <td colspan="2">Action</td>
          </tr>
       </thead>
       <tbody>
          @foreach($fileReference as $fileReference)
          <tr>
             <td>{{ $fileReference->id }}</td>
             <td>{{ $fileReference->name }}</td>
             <td>{{ $fileReference->mime }}</td>
             <td>{{ date('d m Y', strtotime($fileReference->created_at)) }}</td>
             <td><a href="{{ route('fileReference.edit',$fileReference->id)}}" class="btn btn-
                  primary">  <i class="fa fa-edit">Edit</a></td>
                 <td>
                <form action="{{ route('fileReference.destroy', $fileReference->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>

@endsection

@section('jsmodule')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
<script>
    var maxFileSize = {{config('upload.MAX_FILE_SIZE')}};
    var maxChunkSize = {{config('upload.MAX_CHUNK_SIZE')}};

    var uploadPath = '{{route('upload')}}';
 
</script>
<script src="{{ asset('js/fileUpload/fileObject.js') }}"></script>
<script src="{{ asset('js/fileUpload/fileSender.js') }}"></script>
@endsection
