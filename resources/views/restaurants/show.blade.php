@extends('template')

@section('content')
	<div class="container">
		<div class="row col-md-offset-3 col-md-6">
			<h1>Fiche de restaurant</h1>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Nom du restaurant</h3>
				</div>
				<div class="panel-body">
					{!! $restaurant->name !!}
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Heures d'ouverture</h3>
				</div>
				<div class="panel-body">
					@foreach($days as $day)
						@if($day->restaurants->count() > 0)
							<strong>{{ $day->name }} :</strong><br> 
							<ul>
							@foreach($day->restaurants as $restaurant)
								<li>{{ $restaurant->pivot->start_time }} à {{ $restaurant->pivot->end_time }}</li>
							@endforeach
							</ul>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection