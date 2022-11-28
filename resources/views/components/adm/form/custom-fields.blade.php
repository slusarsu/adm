@props(['field' => []])

@if(!empty($field))

    @if($field['type'] == 'text')
{{--        @dd($field);--}}
{{--        <div class="form-group">--}}
{{--            <label for="{{$field->type}}-{{$field->key}}">{{$field->label}}</label>--}}
{{--            <input class="form-control form-control-sm" id="{{$field->type}}-{{$field->key}}"--}}
{{--                   @if($field->required) required @endif--}}
{{--                   type="text" name="fields[{{$field->id}}]"--}}
{{--                   value="{{$field->data}}"--}}
{{--            >--}}
{{--        </div>--}}
    @endif
@endif