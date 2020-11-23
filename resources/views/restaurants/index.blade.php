@extends('template')

@section('content')
	<div class="container">
		<div class="row col-md-offset-3 col-md-6">
			<h1>Restaurants</h1>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Liste des restaurants</h3>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nom</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($restaurants as $restaurant)
							<tr>
								<td>{{ $restaurant->id }}</td>
								<td class="text-primary"><strong>{{ $restaurant->name }}</strong></td>
								<td>{!! link_to_route('restaurant.show', 'Voir', [$restaurant->id], ['class' => 'btn btn-success btn-block']) !!}</td>
								<td>{!! link_to_route('restaurant.edit', 'Modifier', [$restaurant->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
								<td>
									{!! Form::open(['method' => 'DELETE', 'route' => ['restaurant.destroy', $restaurant->id]]) !!}
										{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce restaurant ?\')']) !!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{!! $restaurants->links() !!}
		</div>
	</div>
@endsection