@component('mail::message')

@foreach($vocabularies as $vocabulary)
- {{ $vocabulary->word }}
@endforeach
-
-
-
-
-
-
-
-
-
-
@component('mail::table')
| word          | definition    |
| ------------- |:-------------:|
@foreach($vocabularies as $vocabulary)
| {{$vocabulary->word}} | {{$vocabulary->definition}} |
@endforeach
@endcomponent

@endcomponent
