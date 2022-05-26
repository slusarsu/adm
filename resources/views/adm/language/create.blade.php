@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_language')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.language')}}">{{__('adm.languages')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_language')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.language-store')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_language_name')}}" required value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="native-name">{{__('adm.native_name')}}</label>
                        <input class="form-control" id="native-name" name="native_name" type="text" placeholder="{{__('adm.native_name')}}" value="{{old('native_name')}}">
                    </div>

                    <div class="row">
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.code')}}*</label>
                                <input class="form-control" id="code" name="code" type="text" placeholder="{{__('adm.enter_language_code')}}" required value="{{old('code')}}">
                            </div>
                        </div>
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="direction">{{__('adm.direction')}}</label>
                                <select class="form-select digits" id="direction" name="direction" required >
                                    <option value="ltr">ltr</option>
                                    <option value="rtl">rtl</option>
                                </select>
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
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.language')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection