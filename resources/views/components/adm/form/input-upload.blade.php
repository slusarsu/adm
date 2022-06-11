@props(['name' => '', 'id' => 'upload_file', 'placeholder' => '', 'type' => 'img', 'imgUrl' => ''])

@if($type == 'img')
    <div class="avatar text-center mb-3">
        <img class="b-r-8" src="{{$imgUrl}}" id="{{$id}}_img" alt="#" width="200">
    </div>
@endif

<div class="input-group mb-1">
    <input class="form-control" type="text" placeholder="{{$placeholder}}" aria-label="" id="{{$id}}" name="{{$name}}" readonly>
    <span class="input-group-text popup_selector btn btn-primary" data-inputid="{{$id}}">{{__('adm.select_file')}}</span>
</div>