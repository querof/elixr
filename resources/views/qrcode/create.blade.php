@extends('form')

@section('form_data')

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Add qrcode</h2>
        </div>
    </div>
</div>


<form action="{{ route('qrcode.store') }}" method="POST" name="add_qrcode">
    {{ csrf_field() }}

     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter
                 Title">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea class="form-control" col="4" name="description"
                 placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>{{' '}}Save</button>
          <a href="{{ route('qrcode.index')}}" class="btn"><i class="fa fa-list"></i>{{' '}}Back to List</a></a>
        </div>
    </div>

</form>
@endsection
