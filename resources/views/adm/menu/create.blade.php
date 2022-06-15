@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_menu')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.menu')}}">{{__('adm.menus')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_menu')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.menu-store')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="language">{{__('adm.language')}}</label>
                                <select class="form-select digits" id="language" name="lang" required >
                                    <option value="all">{{__('adm.all')}}</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->code}}">{{$language->name}}</option>
                                    @endforeach

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
                    <a href="{{route('adm.menu')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection