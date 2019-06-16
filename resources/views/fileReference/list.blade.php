@extends('list')

@section('list')

   <div class="col-md-10">
    <h2>Elixr - Media File List</h2>
   </div>
   <div class="col-md-3">
    <a href="{{ route('fileStorage.index') }}" class="btn btn-danger">Add Media File</a>
   </div>
   <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
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
                  primary">Edit</a></td>
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
    {{-- {!! $fileReference->links() !!} --}}

@endsection
