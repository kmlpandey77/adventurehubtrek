<div class="blogs">
	<div class="row">
		<div class="col-sm-5">
			<a href="{{ url('news/'.$n->slug) }}"><img src="{{ asset('uploads/news/' . $n->image) }}" alt="{{ $n->title }}" class="img-responsive"></a>
		</div>
		<div class="col-sm-7">

			<h3><a href="{{ url('news/'.$n->slug) }}">{{ $n->title }}</a></h3>
			<div class="date">{{ $n->event_date() }}</div>
			<p>{{ \Illuminate\Support\Str::limit(strip_tags($n->details), 300) }}</p>
			<a href="{{ url('news/'.$n->slug) }}" class="button button-secondary button-raised button-uppercase button-pill">read more <span class="fa fa-angle-right"></span></a>
			
		</div>
	</div>
</div>