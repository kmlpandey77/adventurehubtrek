<div class="col-md-6 col-lg-4 {{ $key==2 ? 'd-md-none d-lg-block':null }}">
  <div class="blog-col">
  	<a href="{{ $blog->url }}"><img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" class="img-fluid"></a>
    <div class="blog-col-txt">
      <h3><a href="{{ $blog->url }}">{{ $blog->title }}</a></h3>
      <p>{{ str_limit(strip_tags($blog->details), 120) }}</p>
      <a href="{{ $blog->url }}" class="button button-primary button-pill button-small button-border">Read More</a>
    </div>
  </div>
</div>