@extends('layouts.basic-layout')

@section('page-title')
    <title>Dashboard - Hisfa</title>
@stop


@section('app-content')
    <div class="col-xs-12">
		<div class="card card-mini">
			<div class="card-header">
				<div class="card-title">Blocks</div>
				<ul class="card-action">
					<li><a href="/blocks">Types in stock</a></li>
				</ul>
			</div>
			<div class="card-body no-padding table-responsive">
				<table class="table card-table table-hover table-striped foam-type-home">
				<thead>
					<tr>
						<th>Height</th>
						<th>Lenght</th>
                        <th>Units</th>
					</tr>
				</thead>
				<tbody>
					@foreach($blocks as $block)
						<tr>
							<td>{{ $block->units }}</td>
							<td>{{ $block->height }}</td>
							<td>{{ $block->length }}</td>
						</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>
	</div><!-- ./END BLOCKS VIEW -->

	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="/primesilos" class="card card-banner card-green-light">
			<div class="card-body app-heading">
				<div class="app-title">
					<div class="title"><span class="highlight">Prime Silo's</span></div>
					<div class="description">
						<ul class="silo-view prime">
							@foreach($primesilos as $key=>$primesilo)
								<li>
									<p class="volume">{{ $primesilo->capacity_percent }} %</p>
									<p class="silo">{{ $primesilo->name }}</p>
								</li>
							@endforeach
						</ul>
					</div><!-- ./description -->
				</div>
			</div>
		</a>
	</div><!-- ./END PRIME SILO VIEW -->

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<a href="/wastesilos" class="card card-banner card-green-light">
			<div class="card-body app-heading">
				<div class="app-title">
					<div class="title"><span class="highlight">Waste Silo's</span></div>
					<div class="description">
						<ul class="silo-view waste">
							@foreach($wastesilos as $key=>$wastesilo)
								<li>
									<p class="volume">{{ $wastesilo->capacity_percent }} %</p>
									<p class="silo">{{ $wastesilo->name }}</p>
								</li>
							@endforeach
						</ul>
					</div><!-- ./description -->
				</div>
			</div>
		</a>
	</div><!-- ./END WASTE SILO VIEW -->

	<div class="col-xs-12">
		<div class="card card-mini">
			<div class="card-header">
				<div class="card-title">Foam Types</div>
				<ul class="card-action">
					<li><a href="/foam">Types in stock</a></li>
				</ul>
			</div>
			<div class="card-body no-padding table-responsive">
				<table class="table card-table table-hover table-striped foam-type-home">
				<thead>
					<tr>
						<th>Status</th>
						<th>Type</th>
						<th>Amount</th>
						<th>Available sizes</th>
					</tr>
				</thead>
				<tbody>
					@foreach($typeFoams as $foam)
						<tr>
							<td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>In stock</span></span></td>
							<td>{{ $foam->name }}</td>
							<td class="right">10</td>
							<td>8, 8, 8, 4, 4, 4, 3</td>
							<!-- 
							<td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Running out</span></span></td>
						<td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Not available</span></span></td>
							-->
						</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>
	</div><!-- ./END FOAM TYPES VIEW -->
@stop