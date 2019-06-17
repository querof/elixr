@extends('form')

@section('form_data')
<div class="bootstrap-duallistbox-container row moveonselect">
    <div class="pull-left">
        <h2>Update QrCode</h2>
    </div>
    <br><br><br>
    <div class="box1 col-md-6">
        {!! QrCode::size(250)->generate($qrcode_info->id.$qrcode_info->title); !!}
    </div>

    <form action="{{ route('qrcode.update', $qrcode_info->id) }}" method="POST" name="update_qrcode">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="box2 col-md-6">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $qrcode_info->title }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" col="4" name="description" placeholder="Enter Description">{{ $qrcode_info->description }}</textarea>
                </div>
            </div>

        </div>
        <div class="col-md-10">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>{{' '}}Save</button>
            <a href="{{ route('qrcode.index')}}" class="btn"><i class="fa fa-list"></i>{{' '}}Back to List</a>
            <a href="{{ route('qrcodeFileReference.edit',$qrcode_info->id)}}" class="btn btn-warning"><i class="fa fa-plus-square"></i>{{' '}}Add Media</a>
        </div>
    </form>
</div>
@endsection
