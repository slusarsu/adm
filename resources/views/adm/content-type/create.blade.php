@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_content_type')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.content-type')}}">{{__('adm.content_types')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_content_type')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.content-type-store')}}">
            @csrf
            <input type="hidden" value="{{auth()->user()->id}}">
            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.name')}}*</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.name')}}" required value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.key')}}*</label>
                                <input class="form-control" id="key" name="key" type="text" placeholder="{{__('adm.key')}}" required value="{{old('key')}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.singular_name')}}*</label>
                                <input class="form-control" id="singular_name" name="singular_name" type="text" placeholder="{{__('adm.singular_name')}}" required value="{{old('singular_name')}}">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.position')}}*</label>
                                <input class="form-control" id="position" name="position" type="number" placeholder="{{__('adm.position')}}" required value="{{old('position')}}" min="0">
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="enabled">{{__('adm.enabled')}}</label>
                                <select class="form-select" id="enabled" name="enabled" required>
                                    <option value="1">{{__('adm.enabled')}}</option>
                                    <option value="0">{{__('adm.disabled')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="cl-sm-12 col-md-4">
                            <x-adm.form.select-icon/>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.content-type')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection