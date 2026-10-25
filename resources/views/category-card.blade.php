<div class="col-md-6 col-xl-4">
        <div class="card-box mb-5">
      <div class="card-image">
        <a href="{{ $category->url }}"><img src="{{ $category->image() }}" alt="{{ $category->title }}" title="{{ $category->title }}" class="img-fluid"></a>
        <h4><a href="{{ $category->url }}">{{ $category->title }}</a></h4>
      </div>
      <div class="card-txt">
          <p>{{ str_limit(strip_tags($category->details), 120) }}</p>
          <a href="{{ $category->url }}" class="button button-primary button-rounded button-raised button-small">Read more</a>
      </div>
    </div>
  </div>