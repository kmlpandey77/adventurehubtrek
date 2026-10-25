<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>https://www.glacieradventurecompany.com/</loc>
		<lastmod>2018-07-30T15:16:03+00:00</lastmod>
		<priority>1.00</priority>
	</url>

	@foreach (App\page::active()->get() as $page)
	<url>
		<loc>{{ url($page->slug == 'home' ? '/' : $page->slug) }}</loc>
		<lastmod>{{ $page->updated_at->format('c') }}</lastmod>		
	</url>
	@endforeach

	@foreach (App\Destination::active()->get() as $destination)
	<url>
		<loc>{{ url($destination->slug) }}</loc>
		<lastmod>{{ $destination->updated_at->format('c') }}</lastmod>
		@if ($destination->image)
		<image:image>
			<image:loc>{{ $destination->image() }}</image:loc>
			<image:title><![CDATA[{{ $destination->title }}]]></image:title>
		</image:image>
		@endif
	</url>
	@endforeach

	@foreach (App\Activity::active()->get() as $activity)
	<url>
		<loc>{{ url($activity->slug) }}</loc>
		<lastmod>{{ $activity->updated_at->format('c') }}</lastmod>
		@if ($activity->image)
		<image:image>
			<image:loc>{{ $activity->image() }}</image:loc>
			<image:title><![CDATA[{{ $activity->title }}]]></image:title>
		</image:image>
		@endif
	</url>
	@endforeach

	@foreach (App\Region::active()->get() as $region)
	<url>
		<loc>{{ url($region->slug) }}</loc>
		<lastmod>{{ $region->updated_at->format('c') }}</lastmod>
		@if ($region->image)
		<image:image>
			<image:loc>{{ $region->image() }}</image:loc>
			<image:title><![CDATA[{{ $region->title }}]]></image:title>
		</image:image>
		@endif
	</url>
	@endforeach

	@foreach (App\Package::active()->get() as $package)
	<url>
		<loc>{{ url($package->slug) }}</loc>
		<lastmod>{{ $package->updated_at->format('c') }}</lastmod>
		@if ($package->image)
		<image:image>
			<image:loc>{{ $package->image() }}</image:loc>
			<image:title><![CDATA[{{ $package->title }}]]></image:title>
		</image:image>
		@endif

		@if ($package->slides()->count())
			@foreach ($package->slides as $key => $slide)
			<image:image>
				<image:loc>{{ $slide->image() }}</image:loc>
				<image:title><![CDATA[{{ $slide->title }}]]></image:title>
			</image:image>
			@endforeach
		@endif


		@if($package->map && file_exists(public_path('uploads/maps/'.$package->map)))
		<image:image>
			<image:loc>{{ asset('uploads/maps/'.$package->map) }}</image:loc>
			<image:title><![CDATA[{{ $package->title }} Route Map]]></image:title>
		</image:image>
		@endif
		
	</url>
	@endforeach

	@foreach (App\Blog::active()->get() as $blog)
	<url>
		<loc>{{ $blog->url }}</loc>
		<lastmod>{{ $blog->updated_at->format('c') }}</lastmod>
		@if ($blog->image)
		<image:image>
			<image:loc>{{ $blog->image() }}</image:loc>
			<image:title><![CDATA[{{ $blog->title }}]]></image:title>
		</image:image>
		@endif
	</url>
	@endforeach


</urlset>