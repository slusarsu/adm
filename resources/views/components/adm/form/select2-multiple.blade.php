@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'required' => false,
    'classes' => '',
    'data' => [],
    'value' => []
])



<label class="col-form-label">{{__($label)}}</label>

<select class="js-example-basic-multiple col-sm-12 {{$classes}}"
        multiple="multiple"
        name="{{$name}}[]"
        id="{{$id}}"
        @if($required) required @endif
>
    @if(!empty($data))

        @foreach($data as $item)

            <option
                    value="{{$item['value']}}"
                    @if(in_array( $item['value'], $value))
                        selected
                    @endif
            >
                {{$item['title']}}
            </option>

        @endforeach

    @endif
</select>

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/select2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2/select2-custom.js') }}"></script>
@endpush