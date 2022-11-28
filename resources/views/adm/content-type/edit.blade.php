@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.edit_content_type')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.content-type')}}">{{__('adm.content_types')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.edit_content_type')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.content-type-update')}}">
            @csrf
            <input type="hidden" value="{{auth()->user()->id}}">
            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <input type="hidden" name="id" value="{{$item->id}}">

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.name')}}*</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.name')}}" required value="{{$item->name}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.key')}}*</label>
                                <input class="form-control" id="key" name="key" type="text" placeholder="{{__('adm.key')}}" required value="{{$item->key}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.singular_name')}}*</label>
                                <input class="form-control" id="singular_name" name="singular_name" type="text" placeholder="{{__('adm.singular_name')}}" required value="{{$item->singular_name}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.position')}}*</label>
                                <input class="form-control" id="position" name="position" type="number" placeholder="{{__('adm.position')}}" required value="{{$item->position}}" min="0">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="enabled">{{__('adm.enabled')}}</label>
                                <select class="form-select" id="enabled" name="enabled" required>
                                    <option value="1" @if($item->enabled == 1) selected @endif>{{__('adm.enabled')}}</option>
                                    <option value="0" @if($item->enabled == 0) selected @endif>{{__('adm.disabled')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <x-adm.form.select-icon :valueData="$item->icon"/>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.content-type')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>

        <div class="card">
            <div class="card-header pb-0">
                <h5 class="pull-left">{{__('adm.content_type_configuration')}}</h5>
            </div>
            <div class="card-body">
                <div class="tabbed-card">
                    <ul class="pull-right nav nav-pills nav-primary" id="pills-content-type-configuration-btns" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-fields-tab" data-bs-toggle="pill" href="#custom-fields" role="tab" aria-controls="custom-fields" aria-selected="true">
                                <i class="icon-receipt"></i> {{__('adm.custom_fields')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="content-categories-tab" data-bs-toggle="pill" href="#content-categories" role="tab" aria-controls="content-categories" aria-selected="false">
                                <i class="icon-direction-alt"></i> {{__('adm.categories')}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-content-type-configuration">
                        <div class="tab-pane fade show active" id="custom-fields" role="tabpanel" aria-labelledby="custom-fields-tab">
                            @livewire('adm.custom-fields')
                        </div>
                        <div class="tab-pane fade" id="content-categories" role="tabpanel" aria-labelledby="content-categories-tab">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection