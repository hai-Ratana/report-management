@component('mail::message')
# {{ $content['title'] }}

{{ $content['body'] }}

@component('mail::table')
|      projectID          |          project         |       startTime         |        stopTime        |      breakTime           |         Task        |          action      |          knowledge      |          impression      |
| ----------------------- | :-----------------------:| -----------------------:|----------------------- |:------------------------:| -------------------:|---------------------:|------------------------:|-------------------------:|
|{{$content['projectId']}}| {{$content['project']}}  |{{$content['startTime']}}|{{$content['stopTime']}}|{{$content['breakTime']}} | {{$content['task']}}|{{$content['action']}}|{{$content['knowledge']}}|{{$content['impression']}}|



@endcomponent


Thanks,<br>

@endcomponent
