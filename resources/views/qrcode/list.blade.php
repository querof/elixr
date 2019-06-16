@extends('list')

@section('list')

  <div class="col-md-10">
   <h2>Elixr</h2>
  </div>
  <div class="col-md-3">
   <a href="{{ route('qrcode.create') }}" class="btn btn-danger">Add qrcode</a>
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

    <table class="table table-striped table-bordered table-hover dataTables-example" id="laravel_crud">
       <thead>
          <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Description</th>
             <th>Created at</th>
             <td colspan="2">Action</td>
          </tr>
       </thead>
       <tbody>
          @foreach($qrcode as $qrcode)
          <tr>
             <td>{{ $qrcode->id }}</td>
             <td>{{ $qrcode->title }}</td>
             <td>{{ $qrcode->description }}</td>
             <td>{{ date('d m Y', strtotime($qrcode->created_at)) }}</td>
             <td><a href="{{ route('qrcode.edit',$qrcode->id)}}" class="btn btn-
                  primary">Edit</a></td>
                 <td>
                <form action="{{ route('qrcode.destroy', $qrcode->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>
    {{-- {!! $qrcode->links() !!} --}}

@endsection
