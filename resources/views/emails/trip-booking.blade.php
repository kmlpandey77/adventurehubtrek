@component('mail::message')
Date: <b>{{ date('F d, Y') }} </b>  
IP Address: <b>*{{ request()->ip() }}*</b> 
[{{ $ipData['city'] ?? '' }}, {{ $ipData['country_name'] ?? '' }} <img src="{{ $ipData['location']['country_flag'] ?? '' }}" alt="{{ $ipData['country_name'] ?? '' }}" width="16">]  
Trip Name: {{ $request->trip_name }}
<div class="spacer"></div>
<div class="spacer"></div>
<br>



**Name:** {{ $request->text_fname }} {{ $request->text_lname }}  
**Email:** {{ $request->text_email }}  
**Phone:** {{ $request->text_phone }}  
**Country:** {{ $request->sel_country }}  
**Number of traveller:** {{ $request->travellers_no }}  
**Arrival date:** {{ $request->check_in }}  
**Departure date:** {{ $request->check_out }}  
**Airport pickup?:** {{ $request->pickup }}  

**Message:**  
"{!! nl2br(e($request->texta_message)) !!}"


<br>
<br>
<br>

<div class="spacer"></div>
<div class="spacer"></div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent