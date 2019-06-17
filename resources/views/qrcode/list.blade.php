@extends('list')

@section('list')

<div class="col-md-10">
    <h2>Elixr - QrCode</h2>
</div>
<div class="col-md-3">
    <a href="{{ route('qrcode.create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i>{{' '}}Add qrcode</a>
    <br><br>
</div>
<br><br>

<table class="table table-striped table-bordered table-hover dataTables-example" id="laravel_crud">
    <thead>
        <tr>
            <th>Id</th>
            <th>QrCode</th>
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
            <td>
                {!! QrCode::size(250)->generate($qrcode->id.$qrcode->title); !!}
            </td>
            <td>{{ $qrcode->title }}</td>
            <td>{{ $qrcode->description }}</td>
            <td>{{ date('d m Y', strtotime($qrcode->created_at)) }}</td>
            <td><a href="{{ route('qrcode.edit',$qrcode->id)}}" class="btn btn-
                  primary"><i class="fa fa-edit"></i>Edit</a></td>
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
