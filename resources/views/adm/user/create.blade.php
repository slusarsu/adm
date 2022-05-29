@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_user')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.user')}}">{{__('adm.users')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_user')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.user-store')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="email">{{__('adm.email')}}*</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="{{__('adm.email')}}" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <x-adm.form.select2-multiple
                                :label="'adm.roles'"
                                :name="'roles'"
                                :id="'user-roles'"
                                :required="false"
                                :data="$roles"
                        />
                    </div>

                    <div class="row">
                        <div class="cl-sm-12 col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="code">{{__('adm.password')}}*</label>
                                <input class="form-control" id="code" name="password" type="text" placeholder="{{__('adm.enter_password')}}" required>
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
                    <a href="{{route('adm.user')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection