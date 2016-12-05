@extends('layouts.basic-layout')

@section('page-title')
	add resource
@stop

@section('app-title')
	Add resource
@stop

@section('app-content')
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="card card-banner col-xs-12 add-silo">
			<div class="card-body app-heading">
				<div class="app-title">
					<div class="title"><span class="highlight">Add new resource</span></div>
				</div>
			</div>
			<form enctype="multipart/form-data" action="/resources/create" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="input-group">
					<span class="input-group-addon">
						name
					</span>
					<input type="text" id="name" name="name" class="form-control">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						capacity
					</span>
					<input type="text" id="capacity" name="capacity" class="form-control">
				</div>
				<input class="btn btn-success" type="submit" name="create" value="Add resource">
			</form>
		</div>
	</div>
@stop