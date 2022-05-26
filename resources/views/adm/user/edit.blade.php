@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.edit_user')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.user')}}">{{__('adm.users')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.edit_user')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.user-update')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <input type="hidden" name="id" value="{{$item->id}}">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{$item->name}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="native-name">{{__('adm.email')}}*</label>
                        <input class="form-control" id="native-name" name="email" type="text" placeholder="{{__('adm.email')}}" value="{{$item->email}}">
                    </div>

                    <div class="mb-3">
                        <x-adm.form.select2-multiple
                                :label="'adm.roles'"
                                :name="'roles'"
                                :id="'user-roles'"
                                :required="false"
                                :data="$roles"
                                :value="$roleSelected"
                        />
                    </div>

                    <div class="row">
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.password')}}</label>
                                <input class="form-control" id="code" name="password" type="password" placeholder="{{__('adm.enter_password')}}">
                            </div>
                        </div>
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="enabled">{{__('adm.enabled')}}</label>
                                <select class="form-select" id="enabled" name="enabled" >
{{--                                    <option value="1" @if($item->enabled == 1) selected @endif>{{__('adm.enabled')}}</option>--}}
{{--                                    <option value="0" @if($item->enabled == 0) selected @endif>{{__('adm.disabled')}}</option>--}}
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.user')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection