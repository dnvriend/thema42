@section('navbar')
	<div class="sixteen columns">
		<div id="navigation">
			<ul id="nav">
				<li><a id="current" href="{{ URL::route('list.index') }}">Home</a></li>
				<li><a href="{{ URL::route('list.index') }}">Alle lijsten</a></li>
				<li><a href="{{ URL::route('list.create') }}">Nieuwe lijst</a></li>
				<li><a>Malcolm Kindermans</a></li>
				<li><a href="{{ URL::route('list.index') }}">Uitloggen</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
@show