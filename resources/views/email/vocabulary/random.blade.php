@component('mail::message')

@foreach($vocabularies as $vocabulary)
- {{ $vocabulary->word }}
@endforeach
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
@foreach($vocabularies as $vocabulary)
{{ $vocabulary->word }}
@component('mail::panel')
{!! nl2br(e($vocabulary->definition)) !!}
@endcomponent
<br/>
<br/>
@endforeach

@endcomponent
