@props(['url' => '', 'translateText' => '', 'btnClass' => 'btn-primary', 'iconClass'=>''])

<a href="{{$url}}" class="btn {{$btnClass}}">
    @if($iconClass)
        <i class="{{$iconClass}}"></i>
    @endif
    {{__($translateText)}}
</a>
