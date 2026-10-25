@extends('layouts.app')

@section('title')
{{ $page->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}" >
<meta name="keywords" content="{{ $page->m_keyword }}" >
@endsection

@section('content')

<section class="content gray-bg">
  <div class="container">
  	{!! new Breadcrumb($page) !!}

    <div class="row">
      <div class="col-sm-8">
        <div class="content-left">
          <h1>{{ $page->title }}</h1>
          {!! $page->details !!}

        </div>
      </div>
      <div class="col-sm-4">

        <div class="content-right">

        	@if (isset($parent) && $parent)
						<div class="right-menu">
            	<h3>Company</h3>							
							<ul>						
								@foreach ($sidebar as $menu)
								<li><a href="{{ url($menu->slug) }}">{{ $menu->title }}</a></li>
								@endforeach
							</ul>
						</div>
					@endif
          
        </div>            

      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
			e.preventDefault();
			$(this).siblings('a.active').removeClass("active");
			$(this).addClass("active");
			var index = $(this).index();
			$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
			$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		});
	});
</script>
@endsection
