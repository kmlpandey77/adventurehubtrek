<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  <meta property="og:url" content="{{ request()->url() }}" />
  <meta property="og:title" content="@yield('title', config('app.name'))" />
  <meta property="og:type" content="website" /> @yield('meta')

  <meta name="allow-search" content="yes" />
  <meta name="robots" content="index, follow" />
  <meta name="AGLSTERMS.allow-search" content="yes">
  <meta name="rating" content="Recreation, Travel, Outdoor, Adventure, Holidays, Trekking in Nepal">
  <meta name="category" content="Recreation, Adventure, Outdoor, Travel, Holidays and Tourism" />
  <meta name="classification" content="Recreation, Travel, Outdoor, Adventure, Holidays" />
  <meta name="dcterms.rights" content="Copy Rights {{config('app.name')}}">
  <meta name="copyright" content="copy rights {{config('app.name')}}" />
  <meta name="dcterms.dateCopyrighted" content="{{ date('Y') }}">
  <meta name="author" content=" {{config('app.name')}} " />
  <meta name="country" content="worldwide" />
  <meta name="document-type" content="public" />
  <meta name="resource-type" content="document" />
  <meta name="distribution" content="global" />
  <meta http-equiv="bulletin-text" content="Travel and Tourism" />
  <meta content="no-cache" http-equiv="pragma" />

  <meta http-equiv="x-dns-prefetch-control" content="on">
  <link rel='dns-prefetch' href='//google-analytics.com' />
  <link rel='dns-prefetch' href='//googletagmanager.com' />
  <link rel='dns-prefetch' href='//static.doubleclick.net' />

  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('images/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  <link rel="canonical" href="{{ request()->url() }}">

  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|PT+Sans:400,700" rel="stylesheet"> --}}

  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Ubuntu:400,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
  {!! new Minify('css') !!}



  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  @include('inc/header')
  @yield('content')
  @include('inc/footer')
  {!! new Minify('js') !!}
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b62c19cb154e145"></script>
  @yield('script')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c8a13df101df77a8be28272/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>