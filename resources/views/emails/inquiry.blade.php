@component('mail::message')
Date: <b>{{ date('F d, Y') }} </b>  
IP Address: <b>*{{ request()->ip() }}*</b> 
[{{ $ipData['city'] ?? '' }}, {{ $ipData['country_name'] ?? '' }} <img src="{{ $ipData['location']['country_flag'] ?? '' }}" alt="{{ $ipData['country_name'] ?? '' }}" width="16">]  
@if($request->inquiry_page)
Trip Name: {{ $request->inquiry_page }}
@endif
<div class="spacer"></div>
<div class="spacer"></div>
<br>



**Name:** {{ $request->full_name }}  
**Email:** {{ $request->email }}  
**Phone:** {{ $request->phone }}    
**Country:** {{ $request->country }}  

**Message:**  
"{!! nl2br(e($request->message)) !!}"


<br>
<br>
<br>

<div class="spacer"></div>
<div class="spacer"></div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent