@extends('layout')

@section('cssmodule')
	<link href="{{ asset('templates/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
		   <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Record List</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
	                    <div class="table-responsive">
														@yield('list')
							 				</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection
