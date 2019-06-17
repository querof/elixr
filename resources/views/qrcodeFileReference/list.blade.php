@extends('list')

@section('list')

<div class="col-md-10">
    <h2>Elixr- Add Media to qrcode {{$qrcodeName}}</h2>
</div>
<div class="col-md-3">
    <a href="{{ route('qrcode.edit',$qrcodeId) }}" class="btn btn-primary">Go Back</a>
    <br><br>
</div>
<br><br>

<table class="table table-striped table-bordered table-hover dataTables-example" id="laravel_crud">
    <thead>
        <tr>
            <th>Id</th>
            <th>Media Name</th>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($qrcodeFileReference_info as $qrcodeFileReference)
        <tr>
            <td>{{ $qrcodeFileReference->id }}</td>
            <td>{{ $qrcodeFileReference->name }}</td>
            <td>
                @if (isset($qrcodeFileReference->id))
                <form action="{{ route('qrcodeFileReference.destroy', $qrcodeFileReference->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @else
                <form action="{{ route('qrcodeFileReference.store')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="qrcodeId" value="{{$qrcodeId}}">
                    <input type="hidden" name="fileReferenceId" value="{{$qrcodeFileReference->frid}}">
                    <button class="btn btn-primary" type="submit">Add File</button>
                </form>
                @endif
                <a href="{{ route('download',$qrcodeFileReference->frid)}}" class="btn btn-warning">Download</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
