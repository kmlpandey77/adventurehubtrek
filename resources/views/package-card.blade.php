<div class="col-sm-4">
    <div class="trip-box">
        <a href="{{ $package->url }}"><img src="{{ $package->image('400x200') }}" alt="{{ $package->title }}" class="img-fluid"></a>
        <div class="trip-txt">
            <h3><a href="{{ $package->url }}">{{ $package->title }}</a></h3>
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($package->details), 80) }}</p>
        </div>
        <div class="trip-fact">
            <ul class="row">
                <li class="col{{ $package->days()? '-auto':null }}"><i class="fa fa-bar-chart"></i> {{ config('grade.title.' . $package->grade) }}</li>
                @if($package->days())
                <li class="col"><i class="fa fa-clock-o"></i> {{ $package->days() }}</li>
                @endif
                <li class="col-auto"><a href="{{ $package->url }}">View Details</a></li>
            </ul>
        </div>
    </div>
</div>