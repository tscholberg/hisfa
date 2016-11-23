@extends('layouts.basic-layout')

@section('page-title')
	edit resource
@stop

@section('app-title')
    Edit resource
@stop

@section('app-content')
	<div class="col-xs-12">
        <div class="card">
            <div class="card-body app-heading"></div>

			@if (count($errors) > 0)
				<div class="app-heading">
					<div class="section col-xs-12">
						<span class="help-block alert alert-danger alert-profile">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<p class="feedback-title vet">The resource is not updated! Please check the following errors:</p>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</span>
					</div>
				</div>
			@endif

			<form action="{{ url('/resources/' . $resourcedata->id) . '/edit'}}" method="POST" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{ csrf_token() }}">

				<div class="app-heading">
					<div class="section col-xs-12">
						<div class="section-title">
							<i class="icon fa fa-industry" aria-hidden="true"></i> {{ $resourcedata->name }}
						</div>

						<div class="input-group-inapp input-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<span class="input-group-addon">
								<i class="fa fa-tag" aria-hidden="true"></i>
							</span>
							<input type="text" id="name" name="name" class="form-control" value="{{ $resourcedata->name }}">
						</div>

						<div class="input-group-inapp input-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
							<span class="input-group-addon">
								<i class="fa fa-tint" aria-hidden="true"></i>
							</span>
							<input type="text" id="capacity" name="capacity" class="form-control" value="{{ $resourcedata->capacity }}">
						</div>

						<div class="input-group-inapp input-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
							<span class="input-group-addon">
								<i class="fa fa-file-image-o" aria-hidden="true"></i>
							</span>
							<input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" class="upload-file">
						</div>
					</div>
				</div>

				<div class="app-heading">
					<div class="section col-xs-12">
						<div class="form-footer">
							<input type="submit" class="btn btn-success" value="Update resource">
							<a href="/resources" class="btn btn-default">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="btn-floating" id="help-actions">
		<div class="btn-bg"></div>
		<a href="http://www.google.be" type="button" class="btn btn-default btn-toggle">
			<i class="icon fa fa-plus"></i>
			<span class="help-text">Add new resource</span>
		</a>
	</div>
@stop